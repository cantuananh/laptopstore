<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_order';
    protected $primaryKey = 'id';
    protected $fillable = ['detail_product_id', 'order_id', 'quantity'];

    public function detail_product()
    {
        return $this->belongsTo('App\DetailProduct', 'detail_product_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public static function getOrderProductWhere($id)
    {
        return DetailOrder::where('order_id', $id)->latest('id')->get();
    }

    public function getOrderProductBy($id)
    {
        return DetailOrder::findOrFail($id);
    }
}
