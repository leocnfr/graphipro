<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $carts=Cart::all();
        $count=Cart::countRows();
        $total_price=number_format(Cart::totalPrice(),2);
        view()->share(['count'=>$count,'total_price'=>$total_price,'carts'=>$carts]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
