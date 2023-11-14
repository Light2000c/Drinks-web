<?php

namespace App\Http\Controllers\profile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function index()
    {
        return view('profile.editProfile');
    }

    public function update(Request $request)
    {

        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $update = $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email
        ]);

        if (!$update) {
            return back()->with('error', 'User profile was not successfully updated');
        }

        return back()->with('error', 'User profile was successfully updated');
    }
}
