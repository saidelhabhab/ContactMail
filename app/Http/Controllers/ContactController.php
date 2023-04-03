<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contact(){

    return View('contact');
   }

   public function sendEmail(Request $request){

    $datalis=[
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
    ];

    //dd($datalis);
    Mail::to('saidelhabhab@gmail.com')->send(new ContactMail($datalis));
    return back()->with('message_sent','Your Message has been sent successfully!');
   }
}
