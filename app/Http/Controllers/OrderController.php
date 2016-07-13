<?php

namespace App\Http\Controllers;

use App\File;
use App\Format;
use App\Papier;
use App\Pelliculage;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Validator;

class OrderController extends Controller
{
    //

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'price'=>'required|min:1'
        ]);
        if ($validator->fails()){
            alert()->error('购买失败', 'fails!');
            return redirect('product/'.$request->get('product_id'));

        }
       if ($request->file('file'))
        {
            $filename=$request->file('file')->getClientOriginalName();
            $filepath='tmp/'.date('Y-m-d').'/'.$filename;
            Storage::put($filepath,file_get_contents($request->file('file')));
        }

        $product_id=$request->get('product_id');
        $product_name=Products::find($request->get('product_id'))->name;
        $img=Products::find($request->get('product_id'))->productimg;
        $price=$request->get('price');
        $ex=$request->get('ex');
        $design_price=$request->get('design_price');
        if ($product_id==25)
        {
            $larger=$request->get('s-larger');
            $hauter=$request->get('s-hauter');
            $materiels=$request->get('materiels');
            Cart::add($product_id, $product_name, 1, $price,
                [
                    'larger'=>$larger,
                    'hauter'=>$hauter,
                    'materiels'=>$materiels,
                    'ex'=>$ex,
                    'design_price'=>$design_price,
                    'img'=>$img,
                    'filename'=>$filename,
                    'filesize'=>$filesize,
                    'filesrc'=>$filesrc
                ]);
        }elseif (in_array($product_id,array(17,19,18))){
                $size=$request->get('size');

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
                    'tmpname'=>isset($tmpname)?$tmpname:''
                ]);
        }


        alert()->success('购买成功', 'Success!');
        return redirect()->back();
    }

   
    public function destroy($rawid)
    {
        Cart::remove($rawid);
        return redirect()->back();
    }

    public function showAll()
    {
        $directories = Storage::allDirectories('files');
        $files=Storage::files('files');
        return view('admin.order.show',compact('files','directories'));
    }

    public function download($file)
    {
        $path = storage_path('app/'.$file);
        
        return response()->download($path);
    }


}
