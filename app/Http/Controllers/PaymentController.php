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
        $card=$request->get('card_number');
        if (preg_match("^4[0-9]{12}(?:[0-9]{3})?$^",$card))
        {
            echo 'visa';
        }elseif(preg_match("^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$",$card)){
            echo 'mastercard';
        }
//        $files=$request->file('files');
//        $data=array();
//        foreach ($files as $file) {
//            $file->move(('storage/uploads'),$file->getClientOriginalName());
//            array_push($data,[
//                'name'=>$file->getClientOriginalName(),
//                'size'=>$file->getClientSize(),
//                'path'=>'files/'.$file->getClientOriginalName(),
//                'mime'=>$file->getClientMimeType()
//            ]);
//        }
//        DB::table('files')->insert($data);

    }

    public function checkout()
    {
        return view('graphipro.payment');
    }
}
