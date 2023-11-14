<?php

namespace App\Http\Controllers\product;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    public function index(Product $product){

        $products = Product::where('category', $product->category)->whereNot('id', $product->id)->orderBy('created_at', 'DESC')->take(4)->get();
        return view('product.productDetail', [
            'product' => $product,
            'products' => $products
        ]);
    }
    
}
