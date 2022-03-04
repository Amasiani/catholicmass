<?php

namespace App\Http\Controllers;

use App\Models\Adoration;
use App\Models\Announcement;
use App\Models\Church;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Society;
use App\Models\User;
use Illuminate\Support\Arr;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;

class HomeController extends Controller
{
    
    //Home page 
    public function home()
    {
        return view('/dashboard', ['churches' => Church::paginate(10)]);
    }

    public function privacy()
    {
        return view('/privacy');
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
        /**
         * $url Set the API endpoint to a variablr
         * $getfield API endpoint setting
         * #getCurldata() helper function from Http\Helper\helper.php
         * @params string $url and array $getfieldaccepts   
         */
        $url = "https://litcal.johnromanodorazio.com/api/v3/LitCalEngine.php?";
        $getfields = array(
            'locale' => 'EN',
            'epiphany' => 'JAN6',
            'ascension' => 'SUNDAY',
            'corpuschristi' => 'SUNDAY',
            'year' => '',
            'returntype' => 'JSON',
            'nationalpreset' => 'VATICAN',
            'diocesanpreset' => 'DIOCESILAZIO');     
        
        $response = getCurldata($url, $getfields);
        
        /**
         * converting the JSON field to an associative array
         */
        $data = json_decode($response, true); //Js::from($data) -- Larave alternative method
        $litcaldata = $data['LitCal'];

        
        /**
         * Arr::dot() laravel function
         * #intval() casting to integer
         * #dateUTC() convert timestamp to UTC Timezome
         */
        $dataArray = Arr::dot($litcaldata);
        $feastdate = intval($dataArray['Christmas.date']);
        $Christmasdate = dateUTC('d-m-Y', $feastdate);

        return view('/child', ['feast' => $dataArray,
        'xmasDate' => $Christmasdate]);


    }

}
