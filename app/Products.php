<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table='products';

    protected $fillable=[
        'name','type_id','productimg','intro','design_price'
    ];

    public function cate()
    {
        return $this->belongsTo('App\Type','type_id');
    }

    public function hasPro()
    {
        return $this->hasMany(Promotion::class,'product_id');
    }
}
