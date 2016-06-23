<?php

namespace App\Http\Controllers;

use App\Format;
use Illuminate\Http\Request;

use App\Http\Requests;

class FormatController extends Controller
{
    //
    public function show()
    {
        return Format::all();
    }

    public function store(Request $request)
    {
        Format::create($request->all());
        return redirect()->back();
    }
}
