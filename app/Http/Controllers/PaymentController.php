<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        Storage::disk('local')->put('file.txt', 'Contents');
        $files=$request->file('files');
        foreach ($files as $file) {
            Storage::put('files/'.
                $file->getClientOriginalName(),
                file_get_contents($file->getRealPath())
            );
        }

    }
}
