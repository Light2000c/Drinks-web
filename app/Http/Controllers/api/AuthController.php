<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',  $request->email)->first();

        if(!$user){
            return response([
                "status" => "fail",
                "message" => "Invalid login credentials."
            ]);
        }

        $verify = Hash::check($request->password, $user->password);

        if(!$verify){
            return response([
                "status" => "fail",
                "message" => "Invalid login credentials."
            ]);
        }
        
        $token = $user->createToken("user-token")->plainTextToken;

        return response([
            "status" => "success",
            "data" => $user,
            "token" => $token
        ]);

    }

    public function generateToken(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',  $request->email)->first();

        if(!$user){
            return response([
                "status" => "fail",
                "message" => "Invalid credentials."
            ]);
        }

        $verify = Hash::check($request->password, $user->password);

        if(!$verify){
            return response([
                "status" => "fail",
                "message" => "Invalid credentials."
            ]);
        }

        $token = $user->createToken("user-token")->plainTextToken;

        return response([
            "status" => "success",
            "token" => $token
        ]);

    }

}
