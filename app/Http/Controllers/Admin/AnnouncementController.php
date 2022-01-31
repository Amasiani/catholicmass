<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Church;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Church $church)
    {
        //
        //$announcement = Announcement::where('church_id', $church->id)->get();
        return view('admin.announcements.index', 
        ['announcements'=>Announcement::paginate(10),
         'church'=> Announcement::where('church_id', $church->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create announcement
        return view('admin.announcements.create', ['churches' => Church::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save announcement

        //dd($request->church);
        //$announcement = Announcement::create($request->only(['title', 'description', 'church_id'=>2]));
        //$announcement->save($request->all());
        //$church->announcements()->save($announcement);
        
        $church = Church::find($request->church);
        $announcement = new Announcement($request->only(['title', 'description']));        
        $announcement->church()->associate($church);
        $announcement->save();

        $request->session()->flash('success', 'Announcement created');
        return redirect()->route('admin.announcements.index');
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
        return view('admin.announcements.show', ['announcement'=>Announcement::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit
        return view('admin.announcements.edit',
        ['announcement'=>Announcement::find($id)]);
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
        //update        
        $announcement = Announcement::find($id);
        $announcement->update($request->only(['title', 'description']));

        $request->session()->flash('success', 'Announcement updated');
        return redirect()->route('admin.announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        Announcement::destroy($id);
        return redirect()->route('admin.announcements.index')
            ->with('success', 'Announcement deleted');
    }
}
