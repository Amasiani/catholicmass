<?php

/**
 * Namespace for the controller class
 */
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Church;
use Illuminate\Http\Request;

/**
 * Church model funtion file 
 * performance the busines logic
 */ 

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list church
        return response()->json(Church::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create church
        $request->validate([
          'name' => 'required',
          'address' => 'required',
          'latitude' => 'required',
          'longitude' => 'required',
          'program' => 'required',
          'website' => 'required',  
        ]);

        return Church::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        //show
        return response()->json($church);
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
        //edit
        $church = Church::find($id);
        $church->update($request->all());

        return response()->json($church);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete church
        Church::destroy($id);
        return redirect()->back();
    }

    public function search ($name)

    /**
     * Return the specified resource from storage.
     *
     * @param string  $name
     * @return \Illuminate\Http\Response
     */
    {
        return Church::where('name', 'like', '%'.$name.'%')->get();
    }

}
