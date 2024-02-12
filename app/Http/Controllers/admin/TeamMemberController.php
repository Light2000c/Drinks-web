<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeamMemberController extends Controller
{
    public function index(){

        $team_members = User::where('id','!=', Auth::user()->id)->where('is_admin', 1)->paginate(10);
        return view('admin.teamMember', [
            'team_members' => $team_members
        ]);
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);



        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->fullname),
            'is_admin' => 1,
        ]);

        if(!$user){
            return back()->with('error', 'Team memeber was not successfully added.');
        }

        return back()->with('success', 'Team memeber was successfully added.');
    }



}
