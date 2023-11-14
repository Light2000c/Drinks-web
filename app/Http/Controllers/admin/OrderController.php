<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.order', [
            'orders' => $orders,
        ]);
    }

    public function destroy(Order $order)
    {

        $delete = $order->delete();

        if (!$delete) {
            return back()->with('error', 'Order was not successfully deleted');
        }

        return back()->with('success', 'Order has been sucessfully deleted.');
    }
}
