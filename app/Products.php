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

    public function hasSpec()
    {
        return $this->hasMany(SpecialPrice::class,'product_id');
    }

    public function showByCat($query)
    {
        return Products::where('type_id','=',$query)->get();
    }

    public function minCount($proid)
    {
        return Promotion::where('product_id','=',$proid)->min('count');
    }

    public function minPrice($proid)
    {
        return Promotion::where('product_id','=',$proid)->min('price');

    }
}
