<?php

namespace App\Http\Controllers;

use App\Products;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Products::all();
        return view('admin.products.show',compact('products'));
    }

    public function store()
    {
        $types= Type::all();
        return view('admin.products.create',compact('types'));
    }

    public function save(Request $request)
    {
        $product= new Products();
        $file=$request->file('photo');
        $request->file('photo')->move(('storage/uploads'),$file->getClientOriginalName());
        $product->name=$request->get('name');
        $product->type_id=$request->get('type_id');
        $product->productimg=$file->getClientOriginalName();
        $product->intro=$request->get('intro');
        $product->save();
        return redirect('/admin/products/'.$product->id);
    }

    public function edit($id)
    {
        $product=Products::findOrFail($id);
        $types=Type::all();
        return view('admin.products.edit',compact('product','types'));

    }

    public function update(Request $request)
    {
        if ($file=$request->file('photo'))
        {
            $photo=$file->getClientOriginalName();
            $request->file('photo')->move(('storage/uploads'),$file->getClientOriginalName());

        }else{
            $photo=Products::find($request->id)->first()->productimg;
        }
        Products::where('id',intval($request->id))
                ->update(
                    [
                        'name'=>$request->get('name'),
                        'type_id'=>$request->get('type_id'),
                        'intro'=>$request->get('intro'),
                        'format'=>$request->get('format'),
                        'papier'=>$request->get('papier'),
                        'delais'=>$request->get('delais'),
                        'is_show'=>$request->get('is_show'),
                        'productimg'=>$photo
                    ]
                );
        return redirect()->back();
    }
}
