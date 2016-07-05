<?php

namespace App\Http\Controllers;
use Alert;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontPageController extends Controller
{
    //
    public function index()
    {
        return view('graphipro.index');
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
        return view('graphipro.produit_template',compact('product'));
    }
}
