<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $credentials =  $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        try {

            $this->create($credentials);

            if (!Auth::attempt($request->only('email', 'password', true))) {
                return back()->with('error', 'Something went wrong, please try again later.');
            } else {
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function create($credentials)
    {
        User::create([
            'fullname' => $credentials["fullname"],
            'email' => $credentials["email"],
            'password' => Hash::make($credentials["password"]),
        ]);
    }
}
