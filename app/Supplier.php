<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    protected $table = "suppliers";
    protected $fillable = ['name', 'address', 'phone'];

    public function products()
    {
        return $this->hasMany('App\Product', 'brand_id');
    }
    public function bills()
    {
        return $this->hasMany('App\Bill', 'supplier_id');
    }

}
