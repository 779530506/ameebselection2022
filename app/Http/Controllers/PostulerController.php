<?php

namespace App\Http\Controllers;

use App\Models\postuler;
use Illuminate\Http\Request;

class PostulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['postulers'] = postuler::orderBy('id','desc')->paginate(25);
        return view('postulers.index', $data);
        //return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postulers.create');
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
            'nom' => 'required|max:10',
            'poste' => 'required',
            'prenom' => 'required',
            ]);
            // $postuler = new postuler();
            // $postuler->nom = $request->nom;
            // $postuler->prenom = $request->prenom;
            // $postuler->poste = $request->poste;
            //dd($postuler);
            postuler::create($request->all());
            return redirect()->route('postulers.index')->with('success','vous avez postuler avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function show(postuler $postuler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function edit(postuler $postuler)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postuler $postuler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postuler  $postuler
     * @return \Illuminate\Http\Response
     */
    public function destroy(postuler $postuler)
    {
        $postuler->delete();
        return redirect()->route('postulers.index')
        ->with('success','poste supprimé avec succés');
    }
}
