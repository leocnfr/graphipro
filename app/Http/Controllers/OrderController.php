<?php

namespace App\Http\Controllers;

use App\File;
use App\Format;
use App\Livraison;
use App\Order;
use App\Papier;
use App\Pelliculage;
use App\Pro;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;

class OrderController extends Controller
{
	//

	public function store(Livraison $livraison, Request $request)
	{
		if ($request->has('promotion')&&$request->get('promotion')=='promotion'){
			Pro::addToCart($request->get('id'));
			alert()->success('购买成功', 'Success!');
			return redirect()->back();
		}

		$product_id = $request->get('product_id');
		$product_name = Products::find($product_id)->name;
		$design_price = $request->get('design_price');
		$ex = $request->get('ex');
		$img = Products::find($product_id)->productimg;
		$lv_address = $request->get('livraison_address');
		if ($lv_address == 2) {
			$postcode = $request->get('postcode');
			$ville=$request->get('ville');
			$address=$request->get('address').' '.ucwords($ville).' '.$postcode;
			$lv_price=$livraison->LvPrice($postcode,$ex,$product_id);
		} elseif ($lv_address == 0) {
			$lv_price = 0;
			$address = 'Récupérer au bureau Graphipro';
		} else {
			$lv_price=$livraison->LvPrice(Auth::user()->post, $ex, $product_id);
			$address = Auth::user()->address." ".ucwords(Auth::user()->ville)." ".Auth::user()->post;
		}
		$price = $request->get('price') +$design_price+$lv_price;
		$validator = Validator::make($request->all(), [
			'price' => 'required|min:1'
		]);
		if ($validator->fails()) {
			alert()->error('购买失败', 'fails!');
			return redirect('product/' . $request->get('product_id'));
		}
		if ($design_price == 0) {
			if ($request->file('file')) {
				$filename = $request->file('file')->getClientOriginalName();
				$tmppath = 'tmp/' . date('Y-m-d') . '/' . $filename;
				$despath = 'files/' . date('Y-m-d') . '/' . $filename;
				Storage::put($tmppath, file_get_contents($request->file('file')));
			} else {
				return redirect()->back()->with('error', '请选择文件上传');
			}
		}
		if ($product_id == 25) {
			$larger = $request->get('s-larger');
			$hauter = $request->get('s-hauter');
			$materiels = $request->get('text_materiel');
			Cart::add($product_id, $product_name, 1, $price,
				[
					'larger' => $larger,
					'hauter' => $hauter,
					'materiels' => $materiels,
					'ex' => $ex,
					'design_price' => $design_price,
					'img' => $img,
					'lv_address'=>$address,
					'lv_price'=>$lv_price
				]);
		} elseif (in_array($product_id, array(17, 19, 18))) {
			$size = $request->get('formate');
			Cart::add($product_id, $product_name, 1, $price, [
				'size' => $size,
				'ex' => $ex,
				'design_price' => $design_price,
				'img' => $img,
				'lv_address'=>$address,
				'lv_price'=>$lv_price,
				'filename' => isset($filename) ? $filename : '',
				'tmppath' => isset($tmppath) ? $tmppath : '',
				'despath' => isset($despath) ? $despath : ''
			]);
		} else {
			$format = Format::find($request->get('formate'))->format;
			$papier = Papier::find($request->get('papier'))->papier;
			$request->get('imprimer') == 1 ? $imprimer = 'Recto' : $imprimer = 'Recto et verso';
			$pelliculage = Pelliculage::find($request->get('pelliculage'))->pelliculage;
			$day = $request->get('day');
			Cart::add($product_id, $product_name, 1, $price,
				[
					'format' => $format,
					'papier' => $papier,
					'imprimer' => $imprimer,
					'pelliculage' => $pelliculage,
					'day' => $day,
					'ex' => $ex,
					'design_price' => $design_price,
					'img' => $img,
					'lv_address'=>$address,
					'lv_price'=>$lv_price,
					'filename' => isset($filename) ? $filename : '',
					'tmppath' => isset($tmppath) ? $tmppath : '',
					'despath' => isset($despath) ? $despath : ''

				]);
		}

		alert()->success('购买成功', 'Success!');
		return redirect()->back();
	}

	public function destroy($rawid)
	{
		Cart::remove($rawid);
		alert()->success('删除成功', 'Success!');
		return redirect()->back();
	}

	public function showAll()
	{
		$orders = Order::orderBy('created_at', 'desc')->paginate(20);
		return view('admin.order.show', compact('orders'));
	}

	public function download(Request $request)
	{
		$path = storage_path('app/' . $request->get('file_path'));

		return response()->download($path);
	}

}
