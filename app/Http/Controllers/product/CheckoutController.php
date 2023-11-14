<?php

namespace App\Http\Controllers\product;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){

        $cartTotal = 0;
        $totalItems = 0;

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        if($carts->count()){
            foreach($carts as $cart){
                $price = $cart->product->price * $cart->quantity;
                $cartTotal = $cartTotal + $price;
                $totalItems += $cart->quantity;
            }
        }

        return view('product.checkout', [
            'cartTotal' => $cartTotal,
            'totalItems' => $totalItems,
        ]);
    }

    public function checkout(){

    }
}
