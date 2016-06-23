<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

use App\Http\Requests;
class TimeController extends Controller
{
    //
    public function show()
    {

        return view('admin.products.time');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:finish_time'
        ]);
        Time::create($request->all());
        return '200';
    }

    public function showAll()
    {
        return Time::all();
    }

    public function destroy(Request $request)
    {
        if(Time::destroy($request->get('id'))){
            return '200';
        }

    }
}
