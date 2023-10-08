<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{

    public function index(){

        $products = Product::OrderBy('created_at', 'DESC')->paginate(12);
        
        return view('product.shop', [
            'products' => $products,
        ]);
    }

}
