<?php

namespace App\Http\Controllers\payment;

use DateTime;
use Exception;

// use Unicodeveloper\Paystack\Paystack;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function redirectToGateway()
    {

        $total = 0;
        $random = rand(10000, 999999);

        $carts = Cart::where('user_id', Auth::user()->id)->get();

        if ($carts->count()) {
            foreach ($carts as $cart) {
                $total = $total + ($cart->product->price * $cart->quantity);
            }
        }

        $data = array(
            "amount" =>  $total * 100,
            "reference" => Paystack::genTranxRef(),
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "orderID" => $random,
        );

        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }




    public function handleGatewayCallback()
    {


        $paymentDetails = Paystack::getPaymentData();

        if ($paymentDetails['status'] === true) {

            return $this->saveOrder();
        }
    }


    public function saveOrder()
    {
        $time = time();
        $total = 0;
        $items  = 0;

        $user = User::where('id', Auth::user()->id)->first();

        $carts = Cart::where('user_id', $user->id)->get();

        if ($carts->count()) {
            foreach ($carts as $cart) {

                Order::create([
                    'product_id' => $cart->product_id,
                    'user_id' => $cart->user_id,
                    'quantity' => $cart->quantity,
                    'reference_id' => $time,
                ]);

                $total = $total + ($cart->quantity * $cart->product->price);
                $items = $items + $cart->quantity;
            }
        }

        $transaction = $user->transaction()->create([
            'items' => $items,
            'total' => $total,
            'reference_id' => $time,
        ]);

        if (!$transaction) {
            return back();
        }

        $clear = Cart::where('user_id', $user->id)->delete();

        if (!$clear) {
            return back();
        }


        return redirect()->route('account');

        // if (!$order) {
        // }
    }
}
