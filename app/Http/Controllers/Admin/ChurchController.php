<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Models\Announcement;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Announcement $announcement)
    {
        //list churches        
        return view('admin.churches.index', 
        ['churches' => Church::paginate(10),
        'announcements'=> Announcement::where('church_id', $announcement->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create church
        return view('admin.churches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save church
        $church = Church::create($request->except(['_token']));

        $request->session()->flash('Success', 'Church saved');
        return redirect()->route('admin.churches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //church detail
        return view('admin.churches.show', 
        ['church' => Church::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit church
        return view('admin.churches.edit', ['church' => Church::find($id)]);
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
        //update edited church
        $church = Church::find($id);

        $church->update($request->except(['_token']));

        $request->session()->flash('success', 'Church updated');
        return redirect()->route('admin.churches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete church
        /*$church = Church::find($id);
        $church->delete();

        $request->session()->flash('success', 'Church deleted');
        return redirect()->route('admin.churches.index');*/

        Church::destroy($id);
        return redirect()->route('admin.churches.index')
        ->with('success', 'Church deleted');        

    }
}
