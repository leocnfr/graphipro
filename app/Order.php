<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table='orders';
    protected $fillable=['user_id','content','file_src'];

    public function belongsUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
