<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
class TypeController extends Controller
{
    //
    public function index()
    {
        $types=Type::all();
        return view('admin.products.type',compact('types'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:types',
        ]);
        Type::create($request->all());
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Type::destroy($request->get('id'));
        return redirect()->back();
    }
}
