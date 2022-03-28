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
use Illuminate\Support\Facades\Auth;

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
        //Chrismas Date
        $feastdate = intval($dataArray['Christmas.date']);
        $Christmasdate = dateUTC('d-m-Y', $feastdate);
        //Easter Date
        $easterdate = intval($dataArray['Easter.date']);
        $Easter = dateUTC('d-m-Y', $easterdate);
        //Annunciation
        $annunciationdate = intval($dataArray['Annunciation.date']);
        $Annunciation = dateUTC('d-m-Y', $annunciationdate);
        //AshWednesday
        $ashWednesdaydate = intval($dataArray['AshWednesday.date']);
        $ashWednesday = dateUTC('d-m-Y', $ashWednesdaydate);
        //AllSaints
        $allSaintsdate = intval($dataArray['AllSaints.date']);
        $allSaints = dateUTC('d-m-y', $allSaintsdate);
        //ChristKing
        $christKingdate = intval($dataArray['ChristKing.date']);
        $christKing = dateUTC('d-m-Y', $christKingdate);
        //CorpusChristi
        $corpusChristidate = intval($dataArray['CorpusChristi.date']);
        $corpusChristi = dateUTC('d-m-Y', $corpusChristidate);
        //BaptismLord
        $baptismLorddate = intval($dataArray['BaptismLord.date']);
        $baptismLord = dateUTC('d-m-Y', $baptismLorddate);
        //PalmSunday
        $palmSundaydate = intval($dataArray['PalmSun.date']);
        $palmSunday = dateUTC('d-m-Y', $palmSundaydate);


        return view('/child', [
            'feast' => $dataArray,
            'xmasDate' => $Christmasdate,
            'easterdate' => $Easter,
            'annunciation' => $Annunciation,
            'ashWednesday' => $ashWednesday,
            'allSaints' => $allSaints,
            'christKing' => $christKing,
            'corpusChristi' => $corpusChristi,
            'baptismLord' => $baptismLord,
            'PalmSunday' => $palmSunday,
        ]);


    }

}
