<?php

namespace App\Http\Controllers;

use App\Pro;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProController extends Controller
{
    //
    public function index()
    {
        $pros=Pro::all();
        $products=Products::all();
        return view('admin.promotion.index',compact('pros','products'));
    }

    public function store(Request $request)
    {
        Pro::create($request->all());
        return redirect()->back();
    }

    public function edit($id)
    {
        $pro=Pro::findOrFail($id);
        $products=Products::all();
        return view('admin.promotion.edit',compact('pro','products'));
    }

    public function update(Request $request,$id)
    {
        Pro::where('id',$id)
            ->update($request->all());
        return redirect()->back();

    }

    public function destroy($id)
    {
        Pro::destroy($id);
        return redirect()->back();

    }
    
    
}
