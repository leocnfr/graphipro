<?php

namespace App\Http\Controllers;
use Alert;
use App\Pricetablelist;
use App\Pro;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

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

    public function product($id)
    {
        $product=Products::find($id);
        $tables=Pricetablelist::where('product_id',$id)->get();
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
}
