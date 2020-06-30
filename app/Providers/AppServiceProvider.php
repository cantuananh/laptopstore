<?php

namespace App\Providers;

use App\Brand;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layouts.header',function ($view){
            $product_cart =  \Cart::getContent();
            $loai_sp = Brand::all();
            $view->with(['loai_sp'=>$loai_sp,'product_cart'=>$product_cart]);
        });
        view()->composer('frontend.dat_hang',function ($view){
            $loai_sp = Brand::all();
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('frontend.dat_hang',function ($view){
            if(Session('cart')){
                $old_cart = Session::get('cart');
                $cart = new Cart($old_cart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });

    }
}
