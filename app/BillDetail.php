<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['detail_product_id', 'bill_id', 'quantity'];

    public function detail_product()
    {
        return $this->belongsTo('App\DetailProduct', 'detail_product_id');
    }

    public function bill()
    {
        return $this->belongsTo('App\Bill', 'bill_id');
    }

    public function getBillProductBy($id)
    {
        return BillDetail::findOrFail($id);
    }

    public static function getBillProductWhere($id)
    {
        return BillDetail::where('bill_id', $id)->latest('id')->get();
    }
}
