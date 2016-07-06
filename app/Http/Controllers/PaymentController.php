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
        Storage::disk('local')->put('file.txt', 'Contents');
        $files=$request->file('files');
        $data=array();
        foreach ($files as $file) {
            Storage::put('files/'.
                $file->getClientOriginalName(),
                file_get_contents($file->getRealPath())
            );
            array_push($data,[
                'name'=>$file->getClientOriginalName(),
                'size'=>$file->getClientSize(),
                'path'=>'files/'.$file->getClientOriginalName()
            ]);
        }
        DB::table('files')->insert($data);

    }
}
