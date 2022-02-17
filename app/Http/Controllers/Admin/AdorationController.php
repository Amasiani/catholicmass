<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adoration;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class AdorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list adorations
        return view('admin.adorations.index', ['adorations' => Adoration::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create a new adoration object
        return view('admin.adorations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save the adoration object
        $request->validate([
            'name' => 'required|string|max:250',
            'program' => 'required|string',
            'address' => 'required|string',
        ]);
        Adoration::create($request->except('_token'));

        $request->session()->flash('success', 'Adoration created');
        return redirect()->route('admin.adorations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detail view
        return view('admin.adorations.show', ['adoration' => Adoration::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit adoration
        return view('admin.adorations.edit', ['adoration' => Adoration::find($id)]);
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
        //update adoration object
        $adoration = Adoration::find($id);
        $adoration->update($request->except('_token'));

        $request->session()->flash('success', 'Adoration updated');
        return redirect()->route('admin.adorations.index');
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
        Adoration::destroy($id);

        return redirect()->route('admin.adorations.index')
            ->with('success', 'adoration deleted');
    }
}
