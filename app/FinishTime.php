<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishTime extends Model
{
    //
    protected $table='time_list';
    protected $fillable=['time1','time2','time3','price_table_list_id'];
    
    function showtime($ptlid)
    {
        return FinishTime::where('price_table_list_id',$ptlid)->first();
        
    }
}
