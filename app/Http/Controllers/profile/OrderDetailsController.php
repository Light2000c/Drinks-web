<?php

namespace App\Http\Controllers\profile;

use App\Models\Order;
use App\Models\Address;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderDetailsController extends Controller
{
    public function index(Order $order)
    {

        $orders = Order::where('reference_id', $order->reference_id)->orderBy('created_at', 'DESC')->get();

        $transaction =  Transaction::where('reference_id', $order->reference_id)->first();

        $address = Address::where('user_id', Auth::user()->id)->where('default', 1)->first();

        return view('profile.orderDetails', [
            'orders' => $orders,
            'transaction' => $transaction,
            'address' => $address
        ]);
    }
}
