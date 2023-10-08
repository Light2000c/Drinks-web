<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Exception;

class CartController extends Controller
{
    public function index($userId){

        $user = User::where('id', $userId)->first();

        if (!$user) {
            return response([
                'status' =>  'failed',
                'message' =>  'Invalid UserId.',
            ], 400);
        }

        $carts = Cart::where('user_id', $user->id)->get();

        return $carts;
    }

    public function store(Request $request)
    {

        try{

        $request->validate([
            'userId' => 'required',
            'productId' => 'required'
        ]);


        $user = User::where('id', $request->userId)->first();

        $product = Product::where('id', $request->productId)->first();



        if (!$user || !$product) {
            return response([
                'status' =>  'failed',
                'message' =>  'Invalid userId or productId.',
            ], 400);
        }

        if ($product->hasCart($user)) {
            return response([
                'status' => 'failed',
                'message' => 'User already added product to cart'
            ]);
        }

        $cart = $product->cart()->create([
            'user_id' => $user->id,
        ]);

        if (!$cart) {
            return response([
                'status' =>  'failed',
                'message' =>  'Product was not added to cart.',
            ], 400);
        }


        return response([
            'status' =>  'success',
            'message' =>  'Product has been added to cart.',
        ], 200);

    }catch(Exception $e){
        return response([
            'message' => $e->getMessage(),
        ]);
    }

    }



    public function update(Request $request){

        try{

        $request->validate([
            'userId' => 'required',
            'productId' => 'required',
            'quantity' => 'required',
        ]);


        $user = User::where('id', $request->userId)->first();

        $product = Product::where('id', $request->productId)->first();



        if (!$user || !$product) {
            return response([
                'status' =>  'failed',
                'message' =>  'Invalid userId or productId.',
            ], 400);
        }

        $cart = Cart::where('product_id', $request->productId)
        ->where('user_id', $request->userId)->first();


        if (!$cart) {
            return response([
                'status' =>  'failed',
                'message' =>  'Cart not found .',
            ], 400);
        }

        if(!$request->quantity > 0){
            return response([
                'status' =>  'failed',
                'message' =>  'Quantity must be greater than zero',
            ], 400);
        }


        $update = $cart->update([
            'quantity' => $request->quantity,
        ]);


        if(!$update){
            return response([
                'status' =>  'failed',
                'message' =>  'Cart was not successfully updated',
            ], 400);
        }

        return response([
            'status' =>  'success',
            'message' =>  'Cart has been successfully updated',
        ], 200);

    }catch(Exception $e){
        $e->getMessage();
    }


    }




    public function destroy(Request $request){

        try{

        $request->validate([
            'userId' => 'required',
            'productId' => 'required'
        ]);

        $cart = Cart::where('product_id', $request->productId)
        ->where('user_id', $request->userId)->first();


        if (!$cart) {
            return response([
                'status' =>  'failed',
                'message' =>  'Cart not found .',
            ], 400);
        }

        $delete = $cart->delete();

        if(!$delete){
            return response([
                'status' =>  'failed',
                'message' =>  'Cart was not deleted.',
            ], 400);
        }

        return response([
            'status' =>  'success',
            'message' =>  'Cart has been deleted .',
        ], 200);

        
    }catch(Exception $e){
        return response([
            'status' =>  'failed',
            'message' => $e->getMessage(),
        ]);
    }
    }
}
