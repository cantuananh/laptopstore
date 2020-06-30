<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\DetailProduct;
use App\Http\Requests\StoreBillProductRequest;
use App\Http\Requests\UpdateBillProductRequest;
use App\Order;
use App\Product;
use Barryvdh\DomPDF\Facade as PDF;

class DetailOrderController extends Controller
{
    protected $order;
    protected $product;
    protected $detailOrder;
    protected $detailProduct;

    public function __construct()
    {
        $this->order = new Order();
        $this->product = new Product();
        $this->detailOrder = new DetailOrder();
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
        // update quantity product
        $product = $this->product->getProductBy($request->product_id);
        $quantity = $product->quantity - $request->quantity;
        if($quantity<0){
            session()->flash('quantity', 'Số lượng vượt quá số lượng trong kho.');
            return false;
        }
        $product->update(['quantity' => $quantity]);
        // create bill detail
        $detail_product = DetailProduct::where('status',1)->where('product_id', $product->id)->orderBy('updated_at', 'DESC')->first();
        $dataDetailProuduct = [
            'detail_product_id' => $detail_product->id,
            'order_id' => $request->order_id,
            'quantity' => $request->quantity
        ];
        $this->detailOrder->create($dataDetailProuduct);
        //update total price
        $this->order->addTotalPrice($request->product_id, $request->order_id, $request);
        return response()->json([
            'status' => 200,
            'data' => $dataDetailProuduct,
        ]);
    }

    public function show($id)
    {
       //
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
        $billProduct = $this->detailOrder->getOrderProductBy($id);
        $this->order->editTotalPrice($billProduct->product_id, $billProduct->bill_id, $id, $request);
        $billProduct->update($request->all());

        return response()->json([
            'status' => 200,
            'data' => $this->product->getBillProductById($billProduct->product_id, $billProduct->bill_id),
        ]);
    }

    public function destroy($id)
    {
        $billProduct = $this->detailOrder->getOrderProductBy($id);
        $this->order->deleteTotalPrice($billProduct->product_id, $billProduct->bill_id, $billProduct);
        $billProduct->delete();

        return response()->json([
            'status' => 200,
            'data' => $billProduct
        ]);
    }

    public function exportOrder($id)
    {
        $order = $this->order->getOrderBy($id);
        $product_items = $this->detailOrder->where('order_id', $id)->get();
        $pdf = PDF::loadView('backend.orders.pdf', compact('order', 'product_items'));
        return $pdf->download('invoice.pdf');
    }

    public function exportGuarantee($id)
    {
        $detail_order = $this->detailOrder->getOrderProductBy($id);
        $order = $this->order->getOrderBy($detail_order->order_id);
        $pdf = PDF::loadView('backend.orders.order_detail.guarantee', compact('detail_order', 'order'));
        return $pdf->download('invoice.pdf');
      //  return view('backend.orders.order_detail.guarantee', compact('detail_order', 'order'));
    }
}
