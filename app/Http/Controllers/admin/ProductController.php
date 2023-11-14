<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $products = Product::OrderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product', [
            'products' => $products,
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,webp',
            'description' => 'required',
        ]);

        try {

            return  $this->saveProduct($request);
        } catch (Exception $e) {
            // return back()->with('error', $e->getMessage());
            return back()->with('error', 'Something went wrong, please try again later.');
        }
    }



    public function saveProduct($details)
    {

        $new_image = time() . '-' . $details->name . '.' . $details->image->guessExtension();

        $upload = $details->image->move("products", $new_image);
        if (!$upload) {
            return back()->with('error', "Something went wrong while uploading image, please try aginn later");
        }

        $product =  Product::create([
            'name' => $details->name,
            'price' => $details->price,
            'discount' =>  $details->discount,
            'brand' => $details->brand,
            'colour' => $details->colour,
            'size' => $details->size,
            'category' => $details->category,
            'image' => $new_image,
            'description' => $details->description,
        ]);

        if (!$product) {
            return back()->with('error', 'Something went wrong, please try again later.');
        } else {
            return back()->with('success', 'Product has been successfully added to database.');
        }
    }


    public function delete(Product $product)
    {
        try {
            $delete =  $product->delete();

            if (!$delete) {
                return back()->with('error', 'Product was not successfully deleted.');
            } else {
                return back()->with('success', 'Product has been successfully deleted');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong, please try again later.');
        }
    }
}
