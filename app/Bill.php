<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['user_id','supplier_id', 'payment'];

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
}
