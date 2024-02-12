<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index(){

        $wishes = Wishlist::paginate(15);
        return view('admin.wishlist', [
            'wishes' => $wishes,
        ]);
    }

    public function destroy(Wishlist $wish){

        $delete = $wish->delete();

        if(!$delete){
            return back()->with('error', 'Wish was not successfully deleted');
        }
        
        return back()->with('success', 'Wish was successfully deleted');
    }
}
