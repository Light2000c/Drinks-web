<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function send(Request $request){
        $this->validate($request, [
            "name" => "required|max:225",
            "email" => "required|max:225",
            "subject" => "required|max:225",
            "message" => "required|max:225",
        ]);

       $details = $request->all();

        Mail::to("tegaonitsha@gmail.com")->send(new ContactMail($details));

        return back();
    }
}
