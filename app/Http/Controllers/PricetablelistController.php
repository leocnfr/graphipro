<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PricetablelistController extends Controller
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
        dd($request->all());
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
