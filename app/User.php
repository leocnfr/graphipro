<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom','email', 'password','ville','post','societe','type','address','tel'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function showPersonal()
    {
        return User::where('type','=',1)->paginate(15);
    }

    public static function showSociete()
    {
        return User::where('type','=',2)->paginate(15);
    }

    public function hasOrders()
    {
        return $this->hasMany(Order::class);
    }
}
