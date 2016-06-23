<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelliculage extends Model
{
    //
    protected $table='pelliculage_list';
    protected $fillable=['pelliculage'];

    public function showAll()
    {
        return Pelliculage::all();
    }
}
