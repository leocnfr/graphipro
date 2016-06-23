<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;

use App\Http\Requests;

class PriceController extends Controller
{
    //
    public function index($proid,$ptlid)
        
    {
        $prices=Price::all()->orderBy('count')->get();
        return view('admin.products.price',compact('proid','ptlid','prices'));
    }

    public function store(Request $request)
    {
        Price::create($request->all());
        return redirect()->back();
    }
}
