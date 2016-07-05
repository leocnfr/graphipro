<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papier extends Model
{
    //
    protected $table='papier_list';
    protected $fillable=['papier'];

    public function showAll()
    {
        return Papier::all();
    }

    public function showOne($id)
    {
        return Papier::find($id)->papier;
    }
}
