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


    
    
    public function LitcalApi()
    {
        
        $url = "https://litcal.johnromanodorazio.com/api/v3/LitCalEngine.php?";
        $getfield = array(
            'locale' => 'EN',
            'epiphany' => 'JAN6',
            'ascension' => 'SUNDAY',
            'corpuschristi' => 'SUNDAY',
            'year' => '',
            'returntype' => 'JSON',
            'nationalpreset' => 'VATICAN',
            'diocesanpreset' => 'DIOCESILAZIO');
        
        
        
        $data = getCurldata($url, $getfield);

        
        $solemnitiesData = json_decode($data, true);
       $solemnities =  $solemnitiesData["LitCal"];
        $filteredData = array_filter($solemnities, function($data){
                $solemnityDays = array('HolyThurs', 'GoodFri', 'EasterVigil', 'Easter', 'Christmas', 'Epiphany', 'AshWednesday', 'PalmSun');
                return in_array($data["FEASTS_MEMORIALS"]["SOLEMNITIES"], $solemnityDays);
                });
        //return  $filteredData;
        
    }

}
