<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = "feedbacks";
    protected $fillable = ['product_id', 'user_id', 'content'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function product()
    {
        return $this->hasMany('App\Product', 'product_id');
    }

}
