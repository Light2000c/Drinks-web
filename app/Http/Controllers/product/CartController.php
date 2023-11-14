<?php

namespace App\Http\Controllers\product;

use Exception;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->paginate(8);

        $total = 0;
        foreach($carts as $cart){
           $sum = $cart->product->price * $cart->quantity;
            $total = $total + $sum;
        }

        return view('product.cart', [
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function store(Product $product)
    {

        $user_id = Auth()->user()->id;

        try {

            if ($product->hasCart(Auth::user())) {
                return back()->with('error', 'User already added product to cart');
            }

            $cart = $product->cart()->create([
                'user_id' => $user_id,
            ]);

            if (!$cart) {
                return back('error', 'Something went wrong');
            }

            return back()->with('success', 'Successfully added to cart.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {

        $cart = Cart::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();

        $delete = $cart->delete();

        if (!$delete) {
            return back('error', 'Something went wrong');
        }

        return back()->with('success', 'Product has been removed from cart.');
    }
}
