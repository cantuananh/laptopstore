<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
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
                $query->orwhere('description', $description);
            })
            ->latest('id')
            ->paginate(5);
    }
}
