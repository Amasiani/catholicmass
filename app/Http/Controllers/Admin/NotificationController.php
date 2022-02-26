<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class NotificationController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth.isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //list notification 
        return view('admin.notifications.index', 
        ['notifications' => Notification::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create notication
        return view('admin.notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save notification
        //symfony $request methods
        //guessExtension()
        //getMimeType()
        //store()
        //storeAs()
        //storePublicly()
        //move()
        //getClientMimeType()
        //getClientOriginalName()
        //getClientOriginalExtension()
        //getSize()       
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:3048',
        ]);

        $newImageName = time() . '-' . $request->title . '.' . 
            $request->image->extension();
        
        $request->image->move(public_path('images/'), $newImageName);
        Notification::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'img' => $newImageName
        ]);

        $request->session()->flash('success', 'notification created successfully');
        return redirect()->route('admin.notifications.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detail
        return view('admin.notifications.show', 
        ['notification' => Notification::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit notification
        return view('admin.notifications.edit',
            ['notification' => Notification::find($id)]);
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
        $notification = Notification::find($id);
        $notification->title = $request->input('title');
        $notification->description = $request->input('description');

        
         $oldPath = $GLOBALS['oldImage'] = 'images' . $notification->img;
        $destinationPath = 'images/' . $notification->img;
        if(File::exists($destinationPath))
        {
            File::delete($destinationPath);
        }
        else
        {
            $oldPath;
        }
        $file = $request->file('image');
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $file->move('images/', $newImageName);
        $notification->img = $newImageName;

        $notification->update();
        $request->session()->flash('success', 'Notification updated');
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
        //$destinationPath = 'your_path';
        //File::delete($destinationPath.'/your_file');

        $notification = Notification::find($id);
        $destinationPath = 'images/' . $notification->img;
        
        if(File::exists($destinationPath))
        {
            File::delete($destinationPath);
        }
        $notification->delete();
        return redirect()->route('admin.notifications.index')
            ->with('success', 'deleted');
    }
}
