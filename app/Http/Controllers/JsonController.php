<?php

namespace App\Http\Controllers;

use App\Format;
use App\Pricetablelist;
use Illuminate\Http\Request;

use App\Http\Requests;

class JsonController extends Controller
{
    //
    public function getFormat(Request $request)
    {
        $tables=Pricetablelist::where('product_id',$request->get('proid'))->get();
        $formats=array();
        foreach ($tables as $table) {
           $formats= array_merge(json_decode($table->formats),$formats);
        }
        $formats=array_unique($formats);
        foreach ($formats as $format) {
            echo  '<option>'.Format::find($format)->format.'</option>';
        }
    }
}
