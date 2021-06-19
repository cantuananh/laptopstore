<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\RoleUser');
    }
}
