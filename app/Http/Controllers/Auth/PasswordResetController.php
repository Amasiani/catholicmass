<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetController extends Controller
{
    //Password reset form
    public function createLink ()
    {
        return view('create-link');
    }
    
    //Second reset link for delayed response      
    public function resetLink (Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user)
        {
            throw ValidationException::withMessages(['email' => ['Provide email does not exist!']]);
        }
        Password::sendResetLink($request->only('email'));

        $request->session()->flash('success', 'Reset link sent to your email');
        return redirect()->route('welcome');

    } 
}
