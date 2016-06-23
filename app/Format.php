<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    //
    protected $table='format_list';
    protected $fillable=['format'];

    public function showAll()
    {
        return Format::all();
    }
}
