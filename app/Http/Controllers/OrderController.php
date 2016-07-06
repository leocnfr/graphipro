<?php

namespace App\Http\Controllers;

use App\Format;
use App\Papier;
use App\Pelliculage;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
class OrderController extends Controller
{
    //

    public function store(Request $request)
    {
        $product_id=$request->get('product_id');
        $product_name=Products::find($request->get('product_id'))->name;
        $price=$request->get('price');
        $format=Format::find($request->get('format'))->format;
        $papier=Papier::find($request->get('papier'))->papier;
        $request->get('imprimer')==1?$imprimer='Recto':'Recto et verso';
        $pelliculage=Pelliculage::find($request->get('pelliculage'))->pelliculage;
        $day=$request->get('day');
        $ex=$request->get('ex');
        $design_price=$request->get('design_price');
         Cart::add($product_id, $product_name, 1, $price,
            [
                'format'=>$format,
                'papier'=>$papier,
                'imprimer'=>$imprimer,
                'pelliculage'=>$pelliculage,
                'day'=>$day,
                'ex'=>$ex,
                'design_price'=>$design_price
            ]);
        alert()->success('购买成功', 'Success!');
        return redirect('product/'.$product_id);
    }

    public function showPanier()
    {
        dd(Cart::all());
    }
}
