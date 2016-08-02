<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    public $timestamps = false;
    protected $table='promotions';
    protected $fillable=['product_id','count','price'];


}
