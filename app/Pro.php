<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class Pro extends Model
{
    //
    protected $table='pro';
    protected $fillable=['product_id','pro_price','des','is_show','price','city','lv_price'];
    public $timestamps=false;

    public function product()
    {
        return $this->belongsTo(Products::class,'product_id');
    }

	public static function addToCart($id)
	{
		$pro= self::find($id);

		return Cart::add($pro->product->id, $pro->product->name, 1, $pro->pro_price*1.2, [
			'des'=>$pro->des,
			'img'=>$pro->product->productimg,
			'type'=>'promotion'
		]);

	}
}
