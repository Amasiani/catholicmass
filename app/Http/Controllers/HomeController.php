<?php

namespace App\Http\Controllers;

use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //Home page 
    public function home()
    {
        return view('/dashboard', ['churches' => Church::paginate(10)]);
    }

    public function redirect()
    {
        if(Auth::user())
        {
            if(Auth::user()->usertype == '0')
            {
                return view('dashboard');
            }
            else
            {
                return view('admin.dashboard.home');
            }
        }else{
            return redirect()->back();
        }
    }

}
