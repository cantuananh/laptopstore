<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = "brands";
    protected $fillable = ['name', 'description'];

    public function products()
    {
        return $this->hasMany('App\Product', 'brand_id');
    }

    public function getFindBy($id)
    {
        return Brand::findOrFail($id);
    }

    public function search($name, $description)
    {
        return $this->when($name, function ($query) use ($name) {
            $query->orwhere('name', 'like', '%' . $name . '%');
        })
            ->when($description, function ($query) use ($description) {
                $query->orwhere('description', 'like', '%' . $description . '%');
            })
            ->latest('id')
            ->paginate(5);
    }
}
