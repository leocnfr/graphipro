<?php

namespace App\Http\Controllers;

use App\FinishTime;
use Illuminate\Http\Request;

use App\Http\Requests;

class FinishtimeController extends Controller
{
    //
    public function store(Request $request)
    {
        if(FinishTime::where('price_table_list_id',$request->get('price_table_list_id'))->first())
        {
            $data=FinishTime::where('price_table_list_id',$request->get('price_table_list_id'))->first();
            $data->time1=$request->get('time1');
            $data->time2=$request->get('time2');
            $data->time3=$request->get('time3');
            $data->save();

        } else {
            FinishTime::create($request->all());
        }
        return redirect()->back();
    }

    public function index($id)
    {
        return FinishTime::where('price_table_list_id',$id)->first();
    }
}
