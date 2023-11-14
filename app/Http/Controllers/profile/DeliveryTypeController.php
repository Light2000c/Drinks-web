<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliveryTypeController extends Controller
{
    public function index(){
        return view('profile.deliveryType');
    }

    public function update(Request $request){

        $this->validate($request,[
            'delivery_type' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $update = $user->update([
            'delivery_type' => $request->delivery_type,
        ]);

        if(!$update){
            return back()->with('error','Delivery type was not successfully updated');
        }

        return back()->with('error','Delivery type was successfully updated');
    }
}
