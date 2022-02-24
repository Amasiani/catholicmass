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
        return response()->json(Church::chunk(20));
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
        //
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
}
