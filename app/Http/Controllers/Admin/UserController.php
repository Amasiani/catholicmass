<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list users
        return view('admin.users.index', ['users' => User::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create app user
        return view('admin.users.create', 
        ['churches' => Church::all(),
         'roles'=>Role::all()
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
        //save user

        //dd($request);
        
        $appuser = new CreateNewUser();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ]);

       $user = $appuser->create($request->except(['_token', 'church', 'role']));   
       $user->churches()->sync($request->churches);
       $user->roles()->sync($request->roles);

       Password::sendResetLink($request->only('email'));
       $request->session()->flash('success', 'User created');

        return redirect()->route('admin.users.index');
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
        return view('admin.users.show', 
        ['user' => User::find($id)]);
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
        return view('admin.users.edit', 
        ['user' => User::find($id),
         'churches' => Church::all(),
         'roles' => Role::all()]);
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
        $user = User::find($id);
        
        //Admin update user
       /*
        $user->update($request->except(['_token', 'role']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User updated');
        return redirect()->route('admin.users.index');
        */
        
        if(Gate::allows('is-admin'))
        {
            $user->update($request->except(['_token', 'role']));
            $user->roles()->sync($request->roles);

        }
        //Editor update user
        else
        {
            try{
                $user->update($request->except(['_token', 'church', 'role']));
                if(!$user->churches()->sync($request->churches && !$user->roles()->sync($request->roles))){
                    throw New Exception("Incomplete inputs, likely 'Church' not selected");
                }
            }catch (Exception $e){
               echo 'Input error: ', $e->getMessage();
            }
            
        }
              

        $request->session()->flash('success', 'User updated');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user
        User::destroy($id);

        return redirect()->route('admin.users.index')
        ->with('success', 'User deleted');
    }
}
