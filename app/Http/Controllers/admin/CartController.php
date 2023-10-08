<?php

namespace App\Http\Controllers\admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index(){

        $carts = Cart::OrderBy('created_at', 'DESC')->paginate(10);
        return view('admin.cart', [
            'carts' => $carts
        ]);
    }

    public function destroy(Cart $cart){
        
        $delete = $cart->delete();

        if(!$delete){
            return back()->with('error', 'Cart was not deleted');
        }

        return back()->with('sucess', 'Cart has been successfulllydeleted');
    }
}
