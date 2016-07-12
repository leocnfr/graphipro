<?php

namespace App\Http\Controllers;

use App\SpecialPrice;
use Illuminate\Http\Request;

use App\Http\Requests;

class SpecialPriceController extends Controller
{
    //
    public function store(Request $request)
    {
        SpecialPrice::create($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        SpecialPrice::destroy($id);
        return redirect()->back();

    }
}
