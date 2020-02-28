<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\BillProduct;
use App\Http\Requests\BillRequest;
use App\Product;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $bill;
    protected $product;
    protected $supplier;

    public function __construct()
    {
        $this->bill = new Bill();
        $this->product = new Product();
        $this->supplier = new Supplier();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Bill $bill)
    {
        $name = $request->input('name');
        $payment = $request->input('payment');
        $bills = $bill->search($name, $payment);

        return view('backend.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = $this->supplier->all();

        return view('backend.bills.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequest $request)
    {
        $this->bill->create($request->all());

        return redirect()->route('bills.create')->with('message', 'Thêm hóa đơn thành công');
    }

    public function show($id)
    {

        $products = $this->product->all();
        $product_items = BillDetail::getBillProductWhere($id);
        $bill = $this->bill->getBillBy($id);
        $user = User::getUserBy($bill->user_id);

        return view('backend.bills.show', compact('bill', 'product_items', 'user', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $bill = $this->bill->getBillBy($id);
        $suppliers = $this->supplier->all();

        return view('backend.bills.edit', compact('bill', 'users','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillRequest $request, $id)
    {
        $bill = $this->bill->getBillBy($id);
        $bill->update($request->all());

        return redirect()->route('bills.edit', ['bill' => $id])->with('message', 'Sửa hóa đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->bill->destroy($id);

        return redirect()->route('bills.index')->with('message', 'Xóa hóa đơn thành công');
    }
}
