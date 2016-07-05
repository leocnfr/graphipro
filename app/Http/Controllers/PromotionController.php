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
}
