<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth.isAdmin')->only('index');
    }

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
    public function store(Request $request, Church $church)
    {
        //save announcement
        //$announcement = Announcement::create($request->only(['title', 'description', 'church_id'=>2]));
        //$announcement->save($request->all());
        //$church->announcements()->save($announcement);
         $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            
        ]);

        $user = Auth::user();      
        
        if($user->usertype == 0 )
        {
            $announcement = Announcement::create($request->except(['_token']));
            $announcement->save();
            $announcement->church()->associate($request->church);                    
        }
        elseif ($user->usertype == 1 )
        {
            $announcement= Announcement::create($request->except(['_token']));
            $announcement->save();
            $announcement->church()->associate($church); 
        }    
            
        
        $request->session()->flash('success', 'Announcement created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.announcements.show', 
        ['announcement' => Announcement::find($id)]);
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
        return redirect()->back();
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
        return redirect()->route('home')->with('success', 'Announcement deleted');
       

    }
}
