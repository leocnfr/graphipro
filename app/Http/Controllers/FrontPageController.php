<?php

namespace App\Http\Controllers;
use Alert;
use App\Order;
use App\Pricetablelist;
use App\Pro;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Illuminate\Support\Facades\Auth;

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
        return view('graphipro.auth.inscription');
    }

    public function product($name)
    {
        $name=str_replace('-',' ',$name);
        $product=Products::where(compact('name'))->first();
        if ($name=='photocopie')
        {
            return view('graphipro.photocopy');
        }elseif ($name=='impression a lunite')
        {
            return view('graphipro.impression');
        }else
        {
            $tables=Pricetablelist::where('product_id',$product->id)->get();
            $formats=array();
            foreach ($tables as $table) {
                $formats= array_merge(json_decode($table->formats),$formats);
            }
            $formats=array_unique($formats);
            return view('graphipro.product.produit_template',compact('product','formats'));
        }

    }

    public function pro($id)
    {
        $pro=Pro::findOrFail($id);
        return view('graphipro.promotion',compact('pro'));
    }
    public function showPanier()
    {
        $carts=Cart::all();
        $count=Cart::countRows();
        $total_price=Cart::totalPrice();
        return view('graphipro.panier',compact('carts','count','total_price'));
    }

    public function compte(Order $order)
    {

        $orders=$order->where('user_id','=',Auth::user()->id)->paginate(15);
        $bon_commands = $order->showBonCommand();
        return view('graphipro.compte',compact('orders','bon_commands'));
    }
}
