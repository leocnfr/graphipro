<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialPrice extends Model
{
    //
    protected $table='special_price';
    protected $fillable=['product_id','size','price'];
    public $timestamps=false;
}
