<?php

namespace App\Http\Controllers;

use App\File;
use Carbon\Carbon;
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
    public function __construct(){
        $this->middleware('auth');
    }
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

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postpayment(Request $request)
    {
        $carts=Cart::all();
        $amount=Cart::totalPrice();
        foreach ($carts as $cart){
            $amount=$amount+$cart->design_price;
        }

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
                'amount' => $amount*100,
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
        $orders=array();
        foreach ($carts as $cart) {
            $content="";
            if ($cart->id==25)
            {
                $content.=$cart->name."<br/>";
                $content.=$cart->larger*$cart->hauter."<br>";
                $content.=$cart->materiels;
                $content.=$cart->ex;
            }else if(in_array($cart->id,array(17,19,18)))
            {

            }else{
                $content.=$cart->name."<br/>";
                $content.=$cart->format."<br/>";
                $content.=$cart->papier."<br/>";
                $content.=$cart->imprimer."<br/>";
                $content.=$cart->pelliculage."<br/>";
            }
            array_push($orders,[
                'user_id'=>Auth::user()->id,
                'content'=>$content,
                'ex'=>$cart->ex,
                'price'=>$cart->price,
                'design_price'=>$cart->design_price,
                'file_src'=>$cart->despath,
                'created_at'=>Carbon::now()
            ]);
        }
        foreach ($carts as $cart) {
            if ($cart->design_price==0)
            {
                Storage::move($cart->tmppath,$cart->despath);
            }
        }
        DB::table('orders')->insert($orders);
        alert()->success('付款成功','成功');
        return redirect('/');
    }
}
