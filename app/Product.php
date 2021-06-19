<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['name', 'brand_id', 'image', 'ram', 'microprocessors', 'screen', 'description', 'cost', 'price', 'quantity', 'guarantee_time'];

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function bills()
    {
        return $this->belongsToMany('App\Bill')->withPivot('quantity', 'id');
    }

    public function getBillProductById($productId, $billId)
    {
        return $this->with(['bills' => function ($query) use ($billId) {
            $query->where('bill_id', $billId);
        }])
            ->findOrFail($productId);
    }

    public function getProductBy($id)
    {
        return Product::findOrFail($id);
    }

    public function search($name, $brandName)
    {
        return $this->when($name, function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
            ->when($brandName, function ($query) use ($brandName) {
                $query->wherehas('brand', function ($queryProduct) use ($brandName) {
                    $queryProduct->where('name', 'like', '%' . $brandName . '%');
                });
            })->paginate(5);
    }

    public function getSearch($name)
    {
        return $this->when($name, function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->paginate(12);
    }
}
