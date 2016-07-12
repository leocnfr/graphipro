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

class OrderController extends Controller
{
    //

    public function store(Request $request)
    {
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
                    'img'=>$img
                ]);
        }elseif (in_array($product_id,array(17,19,18))){
                $size=$request->get('size');

        }else
        {
            $format=Format::find($request->get('format'))->format;
            $papier=Papier::find($request->get('papier'))->papier;
            $request->get('imprimer')==1?$imprimer='Recto':'Recto et verso';
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
                    'img'=>$img
                ]);
        }


        alert()->success('购买成功', 'Success!');
        return redirect('product/'.$product_id);
    }

   
    public function destroy(Request $request)
    {
        Cart::remove($request->get('raw_id'));

        return redirect()->back();
    }

    public function showAll()
    {
        $directories = Storage::allDirectories('files');
        $files=Storage::files('files');
        return view('admin.order.show',compact('files','directories'));
    }

    public function download()
    {
        $file= public_path(). "/download/info.pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response()->download('storage/uploads/PARTIE 2.jpg.pdf', 'filename.pdf', $headers);
    }
}