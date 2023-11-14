<?php

namespace App\Http\Controllers\profile;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddAddressController extends Controller
{
    public function index()
    {
        return view('profile.addAddress');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'fullname' => 'required',
            'phone' => 'required',
            'delivery_address' => 'required',
            'region' => 'required',
            'city' => 'required',
        ]);

        return $this->saveAddress($request);
    }

    public function saveAddress($request)
    {

        $default = 0;

        $address = Address::where('user_id', Auth::user()->id)->get();

        if (!$address->count()) {
            $default = 1;
        }

        $user = Auth::user();

        $new_address =  $user->address()->create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'delivery_address' => $request->delivery_address,
            'additional_information' => $request->additional_information,
            'region' =>  $request->region,
            'city' => $request->city,
            'default' => $default,
        ]);

        if (!$new_address) {
            return back()->with('error', 'Address was not successfully added.');
        }

        return back()->with('success', 'Address was successfully added.');
    }
}
