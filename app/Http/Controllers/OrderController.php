<?php

namespace App\Http\Controllers;

use App\File;
use App\Format;
use App\Order;
use App\Papier;
use App\Pelliculage;
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

    public function store(Request $request)
    {
        $product_id=$request->get('product_id');
        $product_name=$request->get('product_name');
        $design_price=$request->get('design_price');
        $price=$request->get('price')+$design_price;
        $ex=$request->get('ex');
        $img=Products::find($product_id)->productimg;
        $validator=Validator::make($request->all(),[
            'price'=>'required|min:1'
        ]);
        if ($validator->fails()){
            alert()->error('购买失败', 'fails!');
            return redirect('product/'.$request->get('product_id'));

        }
        if ($design_price==0)
        {
	        if ($request->file('file'))
	        {
		        $filename=$request->file('file')->getClientOriginalName();
		        $tmppath='tmp/'.date('Y-m-d').'/'.$filename;
		        $despath='files/'.date('Y-m-d').'/'.$filename;
		        Storage::put($tmppath,file_get_contents($request->file('file')));
	        }else{
	        	return redirect()->back()->with('error','请选择文件上传');
	        }
        }


        if ($product_id==25)
        {
            $larger=$request->get('s-larger');
            $hauter=$request->get('s-hauter');
            $materiels=$request->get('text_materiel');
            Cart::add($product_id, $product_name, 1, $price,
                [
                    'larger'=>$larger,
                    'hauter'=>$hauter,
                    'materiels'=>$materiels,
                    'ex'=>$ex,
                    'design_price'=>$design_price,
                    'img'=>$img
                   
                ]);
        }elseif (in_array($product_id,array(17,19,18))){
                $size=$request->get('formate');
                Cart::add($product_id,$product_name,1,$price,[
                    'size'=>$size,
                    'ex'=>$ex,
                    'design_price'=>$design_price,
                    'img'=>$img,
                    'filename'=>isset($filename)?$filename:'',
                    'tmppath'=>isset($tmppath)?$tmppath:'',
                    'despath'=>isset($despath)?$despath:''
                ]);

        }else
        {
            $format=Format::find($request->get('formate'))->format;
            $papier=Papier::find($request->get('papier'))->papier;
            $request->get('imprimer')==1?$imprimer='Recto':$imprimer='Recto et verso';
            $pelliculage=Pelliculage::find($request->get('pelliculage'))->pelliculage;
            $day=$request->get('day');
            Cart::add($product_id, $product_name, 1, $price,
                [
                    'format'=>$format,
                    'papier'=>$papier,
                    'imprimer'=>$imprimer,
                    'pelliculage'=>$pelliculage,
                    'day'=>$day,
                    'ex'=>$ex,
                    'design_price'=>$design_price,
                    'img'=>$img,
                    'filename'=>isset($filename)?$filename:'',
                    'tmppath'=>isset($tmppath)?$tmppath:'',
                    'despath'=>isset($despath)?$despath:''

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
        $orders=Order::orderBy('created_at','desc')->paginate(20);
        return view('admin.order.show',compact('orders'));
    }

    public function download(Request $request)
    {
        $path = storage_path('app/'.$request->get('file_path'));
        
        return response()->download($path);
    }


}
