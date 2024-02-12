<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(){

        $users =   User::where('is_admin', 0)->paginate(10);
        return view('admin.account', [
            'users' => $users,
        ]);
    }

    public function destroy(User $user){

        $delete = $user->delete();

        if(!$delete){
            return back()->with('error', 'User was not successfully deleted');
        }

        return back()->with('success', 'User was successfully deleted');
    }
}
