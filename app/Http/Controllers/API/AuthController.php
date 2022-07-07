<?php

namespace App\Http\Controllers\Api;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    //register  new user
    public function register(Request $request)
    {
        $newUser = New CreateNewUser;

        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required|string',
            ]);

        $user = $newUser->create($request->except(['_token', 'church', 'role']));

        /**
         * make a call to this
         * endpoint "https://catholicclock.com/api/roles"
         * to make roles available
         */
        //$user->roles()->sync($request->roles);
        /**
         * make a call to this
         * endpoint "https://catholicclock.com/api/churches"
         * to make church available
        */
        //$user->churches()->sync($request->churches);

        Password::sendResetLink($request->only('email'));
        return response('User created', 201);
    }
    
    //Login user    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are invalid.']
            ]);
        }
        
        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout() 
    {
        //
    }
}
