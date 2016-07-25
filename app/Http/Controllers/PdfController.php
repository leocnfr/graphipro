<?php

namespace App\Http\Controllers;

use App\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    //
    public function make(Order $order,$query)
    {
        $orders=$order->getByBonId($query);
        $pdf = PDF::loadView('pdf',compact('orders'));
        return $pdf->stream('invoice.pdf');
	    //return view('pdf',compact('orders'));
    }
}
