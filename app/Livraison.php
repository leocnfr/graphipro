<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //
    protected $fillable=['postcode','price','numbers','product_id'];
    public $timestamps=false;
}
