<?php

namespace App\Http\Controllers\profile;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {

        $addresses = Address::where('user_id', Auth::user()->id)->get();

        return view('profile.address', [
            'addresses' => $addresses,
        ]);
    }

    public function update(Address $address)
    {

        $updateAll = Address::where('user_id', Auth::user()->id)->update([
            'default' => 0,
        ]);

        if (!$updateAll) {
            return back()->with('error', 'Addresses was not successfully deleted');
        }

        $update = $address->update([
            'default' => 1
        ]);


        if (!$update) {
            return back()->with('error', 'Address was not successfully updated');
        }

        return back()->with('success', 'Address has been successfully updated');
    }


    public function destroy(Address $address)
    {
        $delete = $address->delete();

        if (!$delete) {
            return back()->with('error', 'Address was not successfully deleted');
        }

        return back()->with('success', 'Address has been successfully deleted');
    }
}
