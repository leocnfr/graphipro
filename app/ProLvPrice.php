<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProLvPrice extends Model
{
    //
	protected $table='pro_lv_price';
	protected $fillable=['pro_id','price','city'];
	public $timestamps=false;
}
