<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricetablelist extends Model
{
    //
    protected $table='price_table_list';
    protected $fillable=['formats','papiers','imprimers','pelliculages','product_id'];

    public function showAll($product_id)
    {
        return Pricetablelist::where('product_id',$product_id)->get();
    }

    public function showFormat($id)
    {
        $formats=Pricetablelist::findOrFail($id);
        $formats= json_decode($formats->formats);
        foreach ($formats as $format) {
           echo  $this->format($format);
        }
    }
    public function format($id){
        return Format::findOrFail($id)->format;
    }

    public function showPapier($id)
    {
        $papiers=Pricetablelist::findOrFail($id);
        $papiers= json_decode($papiers->papiers);
        foreach ($papiers as $papier) {
            echo  $this->papier($papier);
        }
    }
    public function papier($id){
        return Papier::findOrFail($id)->papier;
    }

    public function showPelliculage($id)
    {
        $pelliculages=Pricetablelist::findOrFail($id);
        $pelliculages= json_decode($pelliculages->pelliculages);
        foreach ($pelliculages as $pelliculage) {
            echo  $this->pelliculage($pelliculage);
        }
    }
    public function pelliculage($id){
        return Pelliculage::findOrFail($id)->pelliculage;
    }


    public function showImprimer($id)
    {
        $imprimers= Pricetablelist::findOrFail($id)->imprimers;
        return $imprimers==1?'recto':'recto et verso';
    }
    
    //在价格页面显示
    public function formats($id)
    {
        $formats=Pricetablelist::where('id',$id)->first()->formats;

        return json_decode($formats);
    }

    public function papiers($id)
    {
        $papiers=Pricetablelist::where('id',$id)->first()->papiers;
        return json_decode($papiers);
    }

    public function imprimers($id)
    {
        return Pricetablelist::where('id',$id)->first()->imprimers;
    }
}
