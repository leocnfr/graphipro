<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        $files=$request->file('files');
        $data=array();
        foreach ($files as $file) {
            $file->move(('storage/uploads'),$file->getClientOriginalName());
            array_push($data,[
                'name'=>$file->getClientOriginalName(),
                'size'=>$file->getClientSize(),
                'path'=>'files/'.$file->getClientOriginalName(),
                'mime'=>$file->getClientMimeType()
            ]);
        }
        DB::table('files')->insert($data);

    }
}
