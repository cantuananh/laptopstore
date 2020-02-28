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
}
