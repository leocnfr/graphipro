<?php

namespace App\Http\Controllers;

use App\FinishTime;
use App\Price;
use App\Pricetablelist;
use App\Time;
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
        $pelliculages=$request->get('pelliculages');
        if ($pelliculages==null)
        {
            $pelliculages=array();
        }else
        {
            $pelliculages=$request->get('pelliculages');

        }
        Pricetablelist::create([
            'formats'=>json_encode($request->get('formats')),
            'papiers'=>json_encode($request->get('papiers')),
            'pelliculages'=>json_encode($pelliculages),
            'imprimers'=>$request->get('imprimer'),
            'product_id'=>$request->get('product_id')
        ]);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $pelliculages=$request->get('pelliculages');
        if ($pelliculages==null)
        {
            $pelliculages=array();
        }else
        {
            $pelliculages=$request->get('pelliculages');

        }
        Pricetablelist::where('id',$request->get('id'))
                        ->update([
                            'formats'=>json_encode($request->get('formats')),
                            'papiers'=>json_encode($request->get('papiers')),
                            'pelliculages'=>json_encode($pelliculages),
                            'imprimers'=>$request->get('imprimer'),
                        ]);
        return redirect()->back();

    }

    public function destroy($id)
    {
        Pricetablelist::destroy($id);
        Price::where('price_table_list_id',$id)->delete();
        FinishTime::where('price_table_list_id',$id)->delete();
        return redirect()->back();

    }
}
