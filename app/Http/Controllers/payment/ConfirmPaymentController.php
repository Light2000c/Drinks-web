<?php

namespace App\Http\Controllers\payment;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfirmPaymentController extends Controller
{
    public function index(){

        $total = 0;

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        if($carts->count()){
            foreach($carts as $cart){
                $total = $total + ($cart->product->price * $cart->quantity);
            }
        }

        return view('payment.confirmpayment', [
            'total' => $total,
            'carts' => $carts,
        ]);
    }
}
