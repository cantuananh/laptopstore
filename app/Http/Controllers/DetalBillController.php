<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Http\Requests\StoreBillProductRequest;
use App\Http\Requests\UpdateBillProductRequest;
use App\Product;

class DetalBillController extends Controller
{
    protected $bill;
    protected $product;
    protected $billProduct;

    public function __construct()
    {
        $this->bill = new Bill();
        $this->product = new Product();
        $this->billProduct = new BillDetail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->product->all();

        return view('bills.show', compact('products'));
    }


    public function store(StoreBillProductRequest $request)
    {
        $this->billProduct->create($request->all());
        $this->product->addQuantity($request->product_id, $request);
        $this->bill->addTotalPrice($request->product_id, $request->bill_id, $request);

        return response()->json([
            'status' => 200,
            'data' => $this->product->getBillProductById($request->product_id, $request->bill_id),
        ]);
    }

    public function show($id)
    {
        $billProduct = $this->billProduct->getBillProductBy($id);

        return response()->json([
            'status' => 200,
            'data' => $billProduct
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(UpdateBillProductRequest $request, $id)
    {
        $billProduct = $this->billProduct->getBillProductBy($id);
        $this->product->editQuantity($billProduct->product_id, $id, $request);
        $this->bill->editTotalPrice($billProduct->product_id, $billProduct->bill_id, $id, $request);
        $billProduct->update($request->all());

        return response()->json([
            'status' => 200,
            'data' => $this->product->getBillProductById($billProduct->product_id, $billProduct->bill_id),
        ]);
    }

    public function destroy($id)
    {
        $billProduct = $this->billProduct->getBillProductBy($id);
        $this->product->deleteQuantity($billProduct->product_id, $id);
        $this->bill->deleteTotalPrice($billProduct->product_id, $billProduct->bill_id, $billProduct);
        $billProduct->delete();

        return response()->json([
            'status' => 200,
            'data' => $billProduct
        ]);
    }
}
