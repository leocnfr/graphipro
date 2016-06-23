<?php

namespace App\Http\Controllers;

use App\Pricetablelist;
use Illuminate\Http\Request;

use App\Http\Requests;

class PricetableController extends Controller
{
    //
    public function store(Request $request)
    {
//        $this->validate($request,[
//           'formats'=>'required',
//            'papiers'=>'required',
//            'imprimer'=>'required',
//            'pelliculage'=>'required',
//            'product_id'=>'required'
//        ]);
        Pricetablelist::create([
            'formats'=>json_encode($request->get('formats')),
            'papiers'=>json_encode($request->get('papiers')),
            'pelliculages'=>json_encode($request->get('pelliculages')),
            'imprimers'=>$request->get('imprimer'),
            'product_id'=>$request->get('product_id')
        ]);
        return redirect()->back();
    }
}