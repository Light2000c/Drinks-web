<?php

namespace App\Http\Controllers\profile;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishes = Wishlist::where('user_id', Auth::user()->id)->paginate(10);
        return view('profile.wishlist', [
            'wishes' => $wishes,
        ]);
    }

    public function store(Product $product, Request $request)
    {

        $user = Auth::user();

        $wish =  $product->wish()->create([
            'user_id' => $user->id,
        ]);

        if (!$wish) {
            return back()->with('error', 'Product was not successfully added to wishlist.');
        }

        return back()->with('success', 'Product has been successfully added to wishlist.');
    }


    public function delete(Product $product)
    {

        $wish = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();

        $delete =  $wish->delete();

        if (!$delete) {
            return back()->with('error', 'Product was not successfully deleted from wishlist.');
        }

        return back()->with('success', 'Product have been successfully deleted from wishlist.');
    }
}
