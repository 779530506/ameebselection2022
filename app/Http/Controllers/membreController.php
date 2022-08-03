<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\membre;

class membreController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['membres'] = membre::orderBy('id','desc')->paginate(5);
        return view('membres.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroCarte' => 'required|unique:membres|max:9999|integer',
            'telephone' => 'required|unique:membres|max:9',
            ]);

            $membre = new membre;
            $membre->numeroCarte = $request->numeroCarte;
            $membre->telephone = $request->telephone;
            $membre->save();
            return redirect()->route('membres.index')
            ->with('success','membre has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(membre $membre)
    {
        return view("membres.show",compact('membre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(membre $membre)
    {
        return view('membres.edit',compact('membre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numeroCarte' => 'required|max:9999|integer',
            'telephone' => 'required|max:9',
            ]);
        $membre = membre::find($id);
        $membre->numeroCarte = $request->numeroCarte;
        $membre->telephone = $request->telephone;
        $membre->save();
        return redirect()->route('membres.index')
        ->with('success','Company Has Been updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(membre $membre)
    {
        $membre->delete();
        return redirect()->route('membres.index')
        ->with('success','membre has been delete successfully.');
    }
}
