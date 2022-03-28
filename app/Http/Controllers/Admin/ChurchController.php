<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChurchController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth.isAdmin', 'auth.isEditor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Announcement $announcement)
    {
        //list church
        $user = Auth::user();
        if($user->usertype == 0)
        {                
            return view('admin.churches.index', 
            ['churches' => User::find($user->id)->churches()->orderBy('name')->paginate(5),
             'announcements' => Announcement::where('church_id', $announcement->id)->get()]);
        } else {
            return view('admin.churches.index', ['churches' => Church::paginate(10)->fragment('churches')]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create church
        return view('admin.churches.create', ['users' => User::all()]);
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
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'program' => 'required|string',
            'website' => 'required',
        ]);
         
        $user = Auth::user();
        if($user->usertype == 0 )
        {
            $Newchurch = new Church();
            $church = $Newchurch->create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'program' => $request->input('program'),
                'website' => $request->input('website'),
            ]);
    
             $church->users()->sync($user);
        }else {
            Church::create($request->except(['_token']));
        }
        
        $request->session()->flash('Success', 'Church created');
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
        //delete church

        Church::destroy($id);
        return redirect()->back()
         ->with('success', 'Church deleted');        

    }
}
