<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    //
    protected $fillable=['postcode','price','numbers','product_id'];
    public $timestamps=false;

	public function LvPrice($postcode,$ex,$product_id)
	{

		$code=substr($postcode,0,2);
		if ($code=='75')
		{
			$post=1;
		}else{
			$post=2;
		}
		$exs=Livraison::where('product_id',$product_id)->groupBy('numbers')->get()->lists('numbers')->toArray();
		for ($i=0;$i<count($exs);$i++){
			if ($ex<=min($exs)){
				 $ex=min($exs);
			}elseif ($ex>max($exs)){
				 $ex=max($exs);
			}else{
				if ($ex<=$exs[$i]){
					 $ex=$exs[$i];
				}
			}
		}
		return Livraison::where('postcode',$post)
							->where('numbers',$ex)
							->where('product_id',$product_id)->first()->price;
	}
}
