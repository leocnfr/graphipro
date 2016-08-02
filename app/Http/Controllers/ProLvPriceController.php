<?php

namespace App\Http\Controllers;

use App\ProLvPrice;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProLvPriceController extends Controller
{
    //
	public function store(Request $request)
	{
		ProLvPrice::create($request->all());
		return redirect()->back();
	}
}
