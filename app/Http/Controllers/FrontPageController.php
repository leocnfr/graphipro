<?php

namespace App\Http\Controllers;
use Alert;
use App\Pricetablelist;
use App\Pro;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;

class FrontPageController extends Controller
{
    //
    public function index()
    {
        $products=Products::all();
        return view('graphipro.index',compact('products'));
    }

    public function login()
    {
        return view('graphipro.login');
    }

    public function register()
    {
        return view('graphipro.inscription');
    }

    public function product($name)
    {
        $name=str_replace('-',' ',$name);
        $product=Products::where(compact('name'))->first();
        $tables=Pricetablelist::where('name',$product->id)->get();
        $formats=array();
        foreach ($tables as $table) {
            $formats= array_merge(json_decode($table->formats),$formats);
        }
        $formats=array_unique($formats);
        return view('graphipro.produit_template',compact('product','formats'));
    }

    public function pro($id)
    {
        $pro=Pro::findOrFail($id);
        return view('graphipro.promotion',compact('pro'));
    }
    public function showPanier()
    {
//        dd(Cart::all());
        $carts=Cart::all();
        $count=Cart::countRows();
        $total_price=Cart::totalPrice();

        foreach ($carts as $cart){
            $total_price=$total_price+$cart->design_price;
        }
        $total_price=number_format($total_price,2);
        return view('graphipro.panier',compact('carts','count','total_price'));
    }

    public function compte()
    {
        return view('graphipro.compte');
    }
}
