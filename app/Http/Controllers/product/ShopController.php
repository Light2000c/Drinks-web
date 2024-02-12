<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{

    public function index(Request $request)
    {

        $category = $request->category ? $request->category : null;
        $price = $request->price ? $request->price : null;
        $split = '';
        $from = 0;
        $to = 0;

        if ($price != null) {
            $striped_string = str_replace('₦', '', $price);
            $split = explode(' -  ', $striped_string);
            $from  = (int) $split[0];
            $to  = (int) $split[1];
        }

        // dd($from);


        if ($category != null && $price != null) {
            if ($from > 0 && $to > 0) {
                $products = Product::where('category', $category)->where('price', '>=', $from)
                    ->where('price', '<=', $to)->OrderBy('created_at', 'DESC')->paginate(12);
            } else if ($from > 0 && $to <= 0) {
                $products = Product::where('category', $category)->where('price', '>=', $from)
                    ->OrderBy('created_at', 'DESC')->paginate(12);
            } else if ($from <= 0 && $to > 0) {
                $products = Product::where('category', $category)->where('price', '>=', $from)
                    ->OrderBy('created_at', 'DESC')->paginate(12);
            }
            // $products = Product::where('category', $category)->where('price', '<=', $price)->OrderBy('created_at', 'DESC')->paginate(12);
        }

        if ($category != null && $price == null) {
            $products = Product::where('category', $category)->OrderBy('created_at', 'DESC')->paginate(12);
        }

        if ($category == null && $price != null) {
            if ($from > 0 && $to > 0) {
                $products = Product::where('price', '>=', $from)
                    ->where('price', '<=', $to)->OrderBy('created_at', 'DESC')->paginate(12);
            } else if ($from > 0 && $to <= 0) {
                $products = Product::where('price', '>=', $from)
                    ->OrderBy('created_at', 'DESC')->paginate(12);
            } else if ($from <= 0 && $to > 0) {
                $products = Product::where('price', '>=', $from)
                    ->OrderBy('created_at', 'DESC')->paginate(12);
            }
            // $products = Product::where('price', '<=', $price)->OrderBy('created_at', 'DESC')->paginate(12);
        }

        if ($category == null && $price == null) {
            $products = Product::OrderBy('created_at', 'DESC')->skip(3)->paginate(12);
        }

        // $products = Product::OrderBy('created_at', 'DESC')->paginate(12);
        $categories = Category::get();
        $newProducts = Product::OrderBy('created_at', 'DESC')->take(3)->get();

        return view('product.shop', [
            'products' => $products,
            'categories' => $categories,
            "newProducts" => $newProducts,
        ]);
    }



    public function reDirect(Request $request)
    {

        // dd($request->all());
        $category =  $request->category ? $request->category : null;
        $price =  $request->price ? $request->price : null;

        return redirect()->route('shop', ['category' => $category, 'price' => $price]);
    }
}
