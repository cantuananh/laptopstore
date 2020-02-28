<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email' ,'password', 'gender', 'birthday', 'address', 'phone', 'image', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function bills()
    {
        return $this->hasMany('App\Bill', 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user','user_id','role_id');
    }

    public function checkRole($roles)
    {
        if (is_array($roles)) {
            return null !== $this->roles()->whereIn('name', $roles)->first() ||
                abort(401, 'Hành động này không được phép.');
        }
        return null !== $this->roles()->where('name', $roles)->first() ||
            abort(401, 'Hành động này không được phép.');
    }

    public function search($name, $role)
    {
        return $this
            ->when($name, function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            })
            ->when($role, function ($query) use ($role) {
                $query->wherehas('roles', function ($query) use ($role) {
                    $query->where('name', $role);
                });
            })
            ->latest('id')
            ->paginate(5);
    }

    public static function getUserBy($id)
    {
        return User::findOrFail($id);
    }

    public  function getListRoleBy($id)
    {
        return  User::with('roles')->findOrFail($id);
    }
}
