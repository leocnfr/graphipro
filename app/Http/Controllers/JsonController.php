<?php

namespace App\Http\Controllers;

use App\FinishTime;
use App\Format;
use App\Papier;
use App\Pelliculage;
use App\Price;
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

    public function getImprimer(Request $request)
    {
        $tables=Pricetablelist::where('formats','like','%'.$request->get('formate').'%')
            ->where('product_id',$request->get('proid'))
            ->where('papiers','like','%'.$request->get('papier').'%')
            ->get();
        $imprimers=array();
        foreach ($tables as $table) {
            $imprimers= array_merge($table->imprimers,$imprimers);
        }
        $imprimers=array_unique($imprimers);
        dd($imprimers);
    }

    public function getPelle(Request $request)
    {
        $tables=Pricetablelist::where('formats','like','%'.$request->get('formate').'%')
            ->where('product_id',$request->get('proid'))
            ->where('papiers','like','%'.$request->get('papier').'%')
            ->where('imprimers',$request->get('imprimer'))
            ->get();
        $pelliculages=array();
        foreach ($tables as $table) {
            $pelliculages= array_merge(json_decode($table->pelliculages),$pelliculages);
        }
        $pelliculages=array_unique($pelliculages);
        foreach ($pelliculages as $pelliculage) {
            echo  '<option value="'.$pelliculage.'">'.Pelliculage::find($pelliculage)->pelliculage.'</option>';
        }
    }

    public function getPrice(Request $request)
    {
        $tables=Pricetablelist::where('formats','like','%'.$request->get('formate').'%')
            ->where('product_id',$request->get('proid'))
            ->where('papiers','like','%'.$request->get('papier').'%')
            ->where('imprimers',$request->get('imprimer'))
            ->where('pelliculages','like','%'.$request->get('pelliculage').'%')
            ->first();
        $prices=Price::where('price_table_list_id',$tables->id)->get();
        $times=FinishTime::where('price_table_list_id',$tables->id)->first();
        $array=array('prices'=>$prices,'times'=>$times);
        return json_encode($array);
    }
}
