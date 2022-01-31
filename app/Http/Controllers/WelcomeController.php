<?php

namespace App\Http\Controllers;

use App\Models\Church;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //web and mobile App frontage

    public function index(Request $request)
    {
        if(!$request->ajax()){
            return view('welcome');
        }

        $churches = Church::select(['id', 'name'])
            ->when($request->lat and $request->long, function($query) use ($request) {
                $query->addSelect(DB::raw("ST_DISTANCE_sphere(
                    POINT('$request->lat', '$request->long'). point(latitude, longitude)
                        as distance"))->orderBy('distance');
            })
            ->when($request->churchName, function ($query, $churchName) {
                $query->where('churches.name', 'like', "%{$churchName}%");
            })
            ->take(10)->get();

            return response()->json([
                'churches' => $churches
            ]);
    }


    public function admin()
    {
        return view('admin');
    }
}


