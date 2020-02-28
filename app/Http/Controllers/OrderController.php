<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\Http\Requests\BillRequest;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;
    protected $product;
    protected $user;

    public function __construct()
    {
        $this->order = new Order();
        $this->product = new Product();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $payment = $request->input('payment');
        $orders = $this->order->search($name, $payment);

        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= $this->user->all();
        return view('backend.orders.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequest $request)
    {
        $this->order->create($request->all());

        return redirect()->route('orders.create')->with('message', 'Thêm hóa đơn bán thành công');
    }

    public function show($id)
    {
        $products = $this->product->all();
        $product_items = DetailOrder::getOrderProductWhere($id);
        $order = $this->order->getOrderBy($id);
        $user = User::getUserBy($order->user_id);

        return view('backend.orders.show', compact('order', 'product_items', 'user', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users= $this->user->all();
        $order = $this->order->getOrderBy($id);

        return view('backend.orders.edit', compact('users', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = $this->order->getOrderBy($id);
        $order->update($request->all());

        return redirect()->route('orders.edit', ['order' => $id])->with('message', 'Sửa hóa đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->order->destroy($id);

        return redirect()->route('orders.index')->with('message', 'Xóa hóa đơn thành công');
    }
}
