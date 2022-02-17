<?php

namespace App\Http\Controllers;

use App\Models\Adoration;
use App\Models\Announcement;
use App\Models\Church;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Society;
use App\Models\User;
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
                return view('admin.dashboard.home', [
                    'churches' => Church::paginate(10),
                    'users' => User::paginate(10),
                    'announcements' => Announcement::paginate(10),
                    'notifications' => Notification::paginate(10),
                    'adorations' => Adoration::paginate(10),
                    'societies' =>Society::paginate(10),
                    'roles' => Role::paginate(10),
                ]);
            }
        }else{
            return redirect()->back();
        }
    }

}
