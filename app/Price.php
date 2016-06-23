<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected  $table='price';
    protected $fillable=['price_table_list_id','count','price1','price2','price3'];
}
