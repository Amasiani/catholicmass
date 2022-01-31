<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //API response
        if(!$request->ajax()){
            return view('welcome');
        }
        $churches = Church::select(['id', 'name'])
            ->when($request->lat and $request->long, function($query) use ($request) 
            {
                $query->addSelect(DB::raw("ST_DISTANCE_sphere(
                    POINT($request->lat, $request->long), POINT(latitufe, longtitude)
                        as distance)"))->orderBy('distance');
            })->when($request->churchName, function($query, $churchName) {
                $query->where('churches.name', 'like', "%{$churchName}%");
            })->take(10)->get();

            return response()->json(
                [
                'churches' => $churches
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
