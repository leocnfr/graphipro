<?php

namespace App\Http\Controllers;

use App\Format;
use App\Papier;
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

    public function getPapier(Request $request)
    {
        $tables=Pricetablelist::where('formats','like','%'.$request->get('formate').'%')
                                ->where('product_id',$request->get('proid'))
                                ->get();
        $papiers=array();
        foreach ($tables as $table) {
            $papiers= array_merge(json_decode($table->papiers),$papiers);
        }
        $papiers=array_unique($papiers);
        foreach ($papiers as $papier) {
            echo  '<option value="'.$papier.'">'.Papier::find($papier)->papier.'</option>';
        }
    }
}
