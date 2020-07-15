<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\DetailProduct;
use App\Http\Requests\StoreBillProductRequest;
use App\Http\Requests\UpdateBillProductRequest;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;

class DetailBillController extends Controller
{
    protected $bill;
    protected $product;
    protected $billDetail;
    protected $detailProduct;

    public function __construct()
    {
        $this->bill = new Bill();
        $this->product = new Product();
        $this->billDetail = new BillDetail();
        $this->detailProduct = new DetailProduct();
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
        //
    }


    public function store(StoreBillProductRequest $request)
    {
        try {
            // update quantity product
            $product = $this->product->getProductBy($request->product_id);
            $quantity = $product->quantity + $request->quantity;
            $product->update(['quantity' => $quantity]);
            // create detail product
            for ($i = 1; $i < $request->quantity; $i++) {
                $seri = 'seri' . $i;
                $seri1 = 'seri' . ($i-1);
                if($request->$seri == $request->$seri1){
                    session()->flash('seri', 'Số seri phải khác nhau.');
                    return false;
                }
            }
            for ($i = 0; $i < $request->quantity; $i++) {
                $seri = 'seri' . $i;
                $data = [
                    'product_id' => $request->product_id,
                    'seri' => $request->$seri,
                    'status' => 1
                ];
                $this->detailProduct->create($data);
            }
            // create bill detail
            $detail_product = DetailProduct::where('status',1)->orderBy('updated_at', 'DESC')->first();
            $dataDetailProuduct = [
                'detail_product_id' => $detail_product->id,
                'bill_id' => $request->bill_id,
                'quantity' => $request->quantity
            ];
            $this->billDetail->create($dataDetailProuduct);
            //update total price
            $this->bill->addTotalPrice($request->product_id, $request->bill_id, $request);
            return response()->json([
                'status' => 200,
                'data' => $dataDetailProuduct,
            ]);
        } catch (\Exception $exception) {

        }
    }

    public function show($id)
    {
        $billProduct = $this->billDetail->getBillProductBy($id);

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
        $billProduct = $this->billDetail->getBillProductBy($id);
        $this->bill->editTotalPrice($billProduct->product_id, $billProduct->bill_id, $id, $request);
        $billProduct->update($request->all());

        return response()->json([
            'status' => 200,
            'data' => $this->product->getBillProductById($billProduct->product_id, $billProduct->bill_id),
        ]);
    }

    public function destroy($id)
    {
        $billProduct = $this->billDetail->getBillProductBy($id);
        $this->bill->deleteTotalPrice($billProduct->detail_product->product_id, $billProduct->bill_id, $billProduct);
        $billProduct->delete();

        return response()->json([
            'status' => 200,
            'data' => $billProduct
        ]);
    }

    public function exportBill($id)
    {
        $bill = $this->bill->getBillBy($id);
        $product_items = $this->billDetail->where('bill_id', $id)->get();
        $pdf = PDF::loadView('backend.bills.pdf', compact('bill', 'product_items'));
        return $pdf->download('invoice.pdf');
    }
}
