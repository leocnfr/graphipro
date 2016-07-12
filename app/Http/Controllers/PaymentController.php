<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Cart;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{
    //
    public function showpayment(Request $request)
    {
//        $card=$request->get('card_number');
//        if (preg_match("^4[0-9]{12}(?:[0-9]{3})?$^",$card))
//        {
//            echo 'visa';
//        }elseif(preg_match("^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$",$card)){
//            echo 'mastercard';
//        }
        return view('graphipro.payment');
    }

    public function checkout(Request $request)
    {

//        $carts=Cart::all();
//        foreach ($carts as $cart) {
//            Storage::move('tmp/'.$cart->filename,'files/'.$cart->filename);
//        }
        return view('graphipro.checkout');
    }

    public function postpayment(Request $request)
    {
        $token = $request->input('stripeToken');

        Stripe::setApiKey('sk_test_QD9r7RPD0PtSMbyt3WuHOFbJ');
//        if (!isset($emailCheck)) {
        // Create a new Stripe customer
        try {
            $customer = Customer::create([
                'source' => $token,
                'email' => Auth::user()->email,
                'metadata' => [
                    "First Name" => Auth::user()->nom,
                    "Last Name" => Auth::user()->prenom
                ]
            ]);
        } catch (Card $e) {
            return redirect()->route('order')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        $customerID = $customer->id;

        try {
            $charge = Charge::create([
                'amount' => 100,
                'currency' => 'eur',
                'customer' => $customerID,
                'metadata' => [
                    'First Name' =>Auth::user()->nom,
                    'Last Name' =>Auth::user()->prenom,

                ]
            ]);
        } catch (Card $e) {
            return redirect()->route('order')
                ->withErrors($e->getMessage())
                ->withInput();
        }
        alert()->success('付款成功','成功');
        return redirect('/');
    }
}
