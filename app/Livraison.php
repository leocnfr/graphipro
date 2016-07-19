<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //
    protected $fillable=['ville','price'];
    public $timestamps=false;
}
