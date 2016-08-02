<?php

namespace App\Http\Controllers;

use App\FinishTime;
use App\Format;
use App\Livraison;
use App\Papier;
use App\Pelliculage;
use App\Price;
use App\Pricetablelist;
use Illuminate\Http\Request;

use App\Http\Requests;

class JsonController extends Controller
{
	//
	public function getFormat(Request $request)
	{
		$tables = Pricetablelist::where('product_id', $request->get('proid'))->get();
		$formats = array();
		foreach ($tables as $table) {
			$formats = array_merge(json_decode($table->formats), $formats);
		}
		$formats = array_unique($formats);
		foreach ($formats as $format) {
			echo '<option>' . Format::find($format)->format . '</option>';
		}
	}

	public function getPapier(Request $request)
	{
		$tables = Pricetablelist::where('formats', 'like', '%' . $request->get('format') . '%')
			->where('product_id', $request->get('proid'))
			->get();
		$papiers = array();
		foreach ($tables as $table) {
			$papiers = array_merge(json_decode($table->papiers), $papiers);
		}
		$papiers = array_unique($papiers);
		foreach ($papiers as $papier) {
			echo '<option value="' . $papier . '">' . Papier::find($papier)->papier . '</option>';
		}
	}

	public function getImprimer(Request $request)
	{
		$tables = Pricetablelist::where('formats', 'like', '%' . $request->get('format') . '%')
			->where('product_id', $request->get('proid'))
			->where('papiers', 'like', '%' . $request->get('papier') . '%')
			->get();
		$imprimers = array();
		foreach ($tables as $table) {
			array_push($imprimers, $table->imprimers);
		}
		$imprimers = array_unique($imprimers);
		foreach ($imprimers as $imprimer) {
			if ($imprimer == 1) {

				echo '<option value="' . $imprimer . '">' . 'Recto' . '</option>';
			} else {
				echo '<option value="' . $imprimer . '">' . 'Recto et verso' . '</option>';
			}
		}
	}

	public function getPelle(Request $request)
	{
		$tables = Pricetablelist::where('formats', 'like', '%' . $request->get('format') . '%')
			->where('product_id', $request->get('proid'))
			->where('papiers', 'like', '%' . $request->get('papier') . '%')
			->where('imprimers', $request->get('imprimer'))
			->get();
		$pelliculages = array();
		foreach ($tables as $table) {
			echo $table->id . "<br>";
			$pelliculages = array_merge(json_decode($table->pelliculages), $pelliculages);
		}
		$pelliculages = array_unique($pelliculages);

		foreach ($pelliculages as $pelliculage) {
			echo '<option value="' . $pelliculage . '">' . Pelliculage::find($pelliculage)->pelliculage . '</option>';
		}
	}

	public function getPrice(Request $request)
	{
		$tables = Pricetablelist::where('formats', 'like', '%' . $request->get('format') . '%')
			->where('product_id', '=', $request->get('proid'))
			->where('papiers', 'like', '%' . $request->get('papier') . '%')
			->where('imprimers', '=', $request->get('imprimer'))
			->where('pelliculages', 'like', '%' . $request->get('pelliculage') . '%')
			->first();

		$prices = Price::where('price_table_list_id', '=', $tables->id)->orderBy('count')->get();
		$times = FinishTime::where('price_table_list_id', $tables->id)->first();
		$array = array('prices' => $prices, 'times' => $times);
		return json_encode($array);
	}

}
