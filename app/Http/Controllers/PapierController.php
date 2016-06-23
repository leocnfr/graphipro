<?php

namespace App\Http\Controllers;

use App\Papier;
use Illuminate\Http\Request;

use App\Http\Requests;

class PapierController extends Controller
{
    //
    public function store(Request $request)
    {
        Papier::create($request->all());
        return redirect()->back();
    }

    public function show()
    {
        return Papier::all()->toJson();
    }

    public function destroy(Request $request)
    {
         Papier::destroy($request->id);

    }
}
