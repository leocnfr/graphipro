<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    //
    protected $table='pro';
    protected $fillable=['product_id','pro_price','des','is_show','price'];
    public $timestamps=false;

    public function product()
    {
        return $this->belongsTo(Products::class,'product_id');
    }
    
}
