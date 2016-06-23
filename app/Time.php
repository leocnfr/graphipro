<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $table='finish_time';
    protected $fillable=['name'];

    public function showAll()
    {
        return Time::all();
    }
}
