<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cart;

class File extends Model
{
    //
    protected $table='files';
    protected $fillable=['name','size','path','mime'];

    public static function moveToFolder()
    {
        $carts=Cart::all();
        foreach ($carts as $cart) {
            if ($cart->design_price==0)
            {
                $oldpath='/tmp/'.$cart->filename;
                $newpanth='/files'.$cart->filename;
                Storage::move($oldpath,$newpanth);
//                if (!Storage::move($oldpath,$newpanth)){
//                    dd('ddd');
//                }
            }
        }
    }
}
