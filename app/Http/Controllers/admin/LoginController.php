<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        try {

            if (!Auth::attempt($request->only('email', 'password', true))) {
                return back()->with('error', 'Something went wrong, please check login details and try again.');
            } else {
                return redirect()->route('admin-dashboard');
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
