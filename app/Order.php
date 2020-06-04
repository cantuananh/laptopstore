<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'payment'];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_detail');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function search($name_user, $payment)
    {
        return $this->when($name_user, function ($query) use ($name_user) {
            $query->wherehas('user', function ($query_user) use ($name_user) {
                $query_user->where('name', 'like', '%' . $name_user . '%');
            });
        })
            ->when($payment, function ($query) use ($payment) {
                $query->orwhere('payment', $payment);
            })
            ->latest('id')
            ->paginate(5);
    }
    public function getOrderBy($id)
    {
        return Order::findOrFail($id);
    }
    public static function addTotalPrice($product_id, $order_id, $request)
    {
        $order = Order::findOrFail($order_id);
        $product = Product::findOrFail($product_id);
        return $order->update(['total_price' => $order->total_price + $request->quantity * $product->price]);
    }

    public static function deleteTotalPrice($product_id, $bill_id, $request)
    {
        $bill = Bill::findOrFail($bill_id);
        $product = Product::findOrFail($product_id);

        return $bill->update(['total_price' => $bill->total_price - $request->quantity * $product->price]);
    }

    public static function editTotalPrice($product_id, $bill_id, $billproduct_id, $request)
    {
        $bill = Bill::findOrFail($bill_id);
        $product = Product::findOrFail($product_id);
        $billProduct = BillDetail::findOrFail($billproduct_id);

        return $bill->update(['total_price' => $bill->total_price - $billProduct->quantity * $product->price + $request->quantity * $product->price]);
    }
}
