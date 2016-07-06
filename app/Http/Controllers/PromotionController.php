<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PromotionController extends Controller
{
    //
    public function store(Request $request)
    {
        Promotion::create($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Promotion::destroy($id);
        return redirect()->back();

    }

    public function update(Request $request)
    {

        Promotion::where('id',$request->get('id'))
                    ->update([
                        'count'=>$request->get('count'),
                        'price'=>$request->get('price')
                    ]);
        return redirect()->back();

    }
}
