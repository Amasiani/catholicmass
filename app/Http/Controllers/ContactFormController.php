<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    //
    public function contactIndex()
    {
        return view('contact-us');
    }

    public function sendContactMail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message'=> 'required|string|min:20',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
            ];

        Mail::to('test@test.com')->send(new ContactMail($details));

        return back()->with('success', 'Your message has been sent successfully');
    }
}
