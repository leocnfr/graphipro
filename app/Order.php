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

    public function storeOrder($request)
    {
        $product_id=$request->get('product_id');
        $product_name=Products::find($request->get('product_id'))->name;
        $img=Products::find($request->get('product_id'))->productimg;
        $price=$request->get('price');
        $ex=$request->get('ex');
        $design_price=$request->get('design_price');
    }
    
}
