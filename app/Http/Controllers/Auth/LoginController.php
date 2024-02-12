<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
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
            }

            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

         $update =  $user->update([
                "access_token" => $token
            ]);


            return redirect()->route('home');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
