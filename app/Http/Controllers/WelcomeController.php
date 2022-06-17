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
        if (!$request->ajax()) {
            return view('welcome');
        }

        $churches = Church::select(['id', 'name', 'website', 'address'])
            ->when($request->latitude and $request->longitude, function ($query) use ($request) {
                $query->addSelect(DB::raw("ST_Distance_Sphere(
                    POINT('$request->longitude', '$request->latitude'), POINT(longitude, latitude)
                    ) AS distance"))
                    ->orderBy('distance');
            })
            ->when($request->name, function ($query, $name) {
                $query->where('churches.name', 'LIKE', "%{$name}%");
            })
            ->take(12)->get();

        return response()->json([
            'churches' => $churches,
        ]);
    }

    public function admin()
    {
        return view('/admin');
    }

}
