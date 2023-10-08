<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ProductDetailController extends Controller
{
    public function index(Product $product)
    {
        if (!$product) {
            return back();
        }

        return view('admin.productDetail', [
            'product' => $product,
        ]);
    }

    public function update(Product $product, Request $request)
    {

        if (!$request->image == "") {
            return  $this->updateWithImage($request, $product);
        } else {
            return  $this->updateWithNoImage($request, $product);
        }
    }

    public function updateWithImage($request, $product)
    {

        $this->validate($request, [
            'name' => $request->name == $product->name ? 'required' : 'required|unique:products,name',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,jfif,webp',
            'description' => 'required',
        ]);


        // try{

        $new_image = time() . '-' . $request->name . '.' . $request->image->guessExtension();

        $upload = $request->image->move("products", $new_image);
        if (!$upload) {
            return back()->with('error', "Something went wrong while uploading image, please try aginn later");
        }

        $update =  $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'discount' =>  $request->discount,
            'brand' => $request->brand,
            'colour' => $request->colour,
            'size' => $request->size,
            'category' => $request->category,
            'image' => $new_image,
            'description' => $request->description,
        ]);

        if (!$update) {
            return back()->with('error', 'Something went wrong, please try again later.');
        } else {
            return back()->with('success', 'Product has been successfully updated.');
        }

        // }catch(Exception $e){

        // }
    }



    public function updateWithNoImage($request, $product)
    {

        $this->validate($request, [
            'name' => $request->name == $product->name ? 'required' : 'required|unique:products,name',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        // try{

        $update =  $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'discount' =>  $request->discount,
            'brand' => $request->brand,
            'colour' => $request->colour,
            'size' => $request->size,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        if (!$update) {
            return back()->with('error', 'Something went wrong, please try again later.');
        } else {
            return back()->with('success', 'Product has been successfully updated.');
        }

        // }catch(Exception $e){

        // }
    }
}
