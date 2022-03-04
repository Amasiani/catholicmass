<?php

namespace App\Http\Controllers;

use App\Mail\InquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    //display mail
    public function inquiryIndex()
    {
        return view('inquiry');
    }
    

    public function sendInquiryMail(Request $request)
    {
        $details = 
        [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' =>$request->location,
            'message' => $request->message,
        ];

        Mail::to('info@catholicclock.com')->send(new InquiryMail($details));
        return back()->with('success', 'message sent successfully');
    }

}
