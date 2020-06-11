<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $table = 'detail_product';
    protected $fillable = ['product_id', 'seri', 'status'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function search($name, $id)
    {
        return $this->where('product_id', $id)->latest('id')
            ->when($name, function ($query) use ($name) {
            $query->where('seri', 'like', '%' . $name . '%');
        })->paginate(12);
    }
}
