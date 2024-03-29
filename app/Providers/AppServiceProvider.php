<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
  

        view()->composer('*', function() {
            $total = 0;

            if(Auth::user()){
                $carts = Cart::where('user_id', Auth::user()->id)->get();

                foreach ($carts as $cart) {
                 $total = $total +  ($cart->quantity * $cart->product->price);
                }

                View::share('vCarts', $carts);
                View::share('vCartsTotal', $total);
            }

        });


        // VerifyEmail::toMailUsing(function ($notifiable, $url) {
        //     return (new \Illuminate\Notifications\Messages\MailMessage)
        //         ->subject('Verify your email address new')
        //         ->line('Click the button below to verify your email address.')
        //         ->action('Verify Email Address', $url);
        // });
    }
}
