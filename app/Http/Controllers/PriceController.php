<?php

namespace App\Http\Controllers;

use App\Format;
use App\Papier;
use App\Pelliculage;
use App\Price;
use Illuminate\Http\Request;

use App\Http\Requests;

class PriceController extends Controller
{
    //
    public function index($proid,$ptlid)
        
    {
        $formats=Format::all();
        $papiers=Papier::all();
        $pelliculages=Pelliculage::all();
        $prices=Price::where('price_table_list_id',$ptlid)->orderBy('count')->get();
        return view('admin.products.price',compact('proid','ptlid','prices','formats','papiers','pelliculages'));
    }

    public function store(Request $request)
    {
        Price::create($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Price::destroy($id);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        Price::where('id',$request->get('id'))
                ->update([
                    'count'=>$request->get('count'),
                    'price1'=>$request->get('price1'),
                    'price2'=>$request->get('price2'),
                    'price3'=>$request->get('price3'),
                ]);
        return redirect()->back();

    }
}
