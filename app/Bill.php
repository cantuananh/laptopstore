<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['user_id', 'supplier_id', 'payment', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
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

    public function getBillBy($id)
    {
        return Bill::findOrFail($id);
    }

    public static function addTotalPrice($product_id, $bill_id, $request)
    {
        $bill = Bill::findOrFail($bill_id);
        $product = Product::findOrFail($product_id);
        return $bill->update(['total_price' => $bill->total_price + $request->quantity * $product->price]);
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
