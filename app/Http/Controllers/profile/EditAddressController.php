<?php

namespace App\Http\Controllers\profile;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditAddressController extends Controller
{
    public function index(Address $address){

        return view('profile.editAddress', [
            'address' => $address,
        ]);
    }

    public function update(Address $address, Request $request){

        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required',
            'delivery_address' => 'required',
            'region' => 'required',
            'city' => 'required',
        ]);
        
        return $this->saveChanges($address, $request);
    }

    public function saveChanges($address, $request){

        $update = $address->update([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'delivery_address' => $request->delivery_address,
            'additional_information' => $request->additional_information,
            'region' =>  $request->region,
            'city' => $request->city,
        ]);

        if(!$update){
            return back()->with('error', 'Address was not updated.'); 
        }

        return back()->with('success', 'Address has been successfully updated.');

    }
}
