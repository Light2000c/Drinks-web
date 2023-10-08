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

        return view('product.productDetail', [
            'product' => $product
        ]);
    }
    
}
