<?php

namespace App\Http\Controllers;
use App\Models\vote;

use App\Models\membre;
use Illuminate\Http\Request;
use Carbon\Carbon;

class voteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['votes'] = vote::orderBy('id','desc')->paginate(50);
        $data['countAmadou'] = vote::where('president', 'amadou')->count();
        $data['countAlsane'] = vote::where('president', 'alsane')->count();
        $data['null'] = vote::where('president', 'null')->count();
        $data['total'] = $data['countAmadou']+$data['countAlsane']+$data['null'];


        return view('votes.index', $data);
        //return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('votes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y H:i:s', '18/09/2022 12:00:00');
        $endDate = Carbon::createFromFormat('d/m/Y H:i:s', '03/09/2022 13:00:00');

        $check = Carbon::now()->between($startDate, $endDate);

        // if(!$check){
        //     return back()->with('fail','Erreur, vote non ouvert ou fermé');
        // }
        $request->validate([
            'numeroCarte' => 'unique:votes|required|exists:membres,numeroCarte|max:9999|integer',
            'telephone' => 'required|exists:membres,telephone|max:9',
            'president' => 'required',
            ]);

            $vote = new vote;
            $membre = new membre;
            $vote->numeroCarte = $request->numeroCarte;
            $vote->president = $request->president;
            $vote->telephone = $request->telephone;
            $membre_id= membre::where('numeroCarte',$request->numeroCarte)->first()->id;
            $vote->membre_id = $membre_id;

            $existe= membre::where('numeroCarte',$request->numeroCarte)->where('telephone',$request->telephone)->first();
            if($existe){
                $vote->save();
                return redirect()->route('votes.index')
                ->with('success','vous avez voté avec succès');
            }else{
                 return back()->with('fail','Erreur, le numéro carte et le numéro telephone ne correspond à aucun membre AMEEBS');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(vote $vote)
    {
        return view("votes.show",compact('vote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(vote $vote)
    {
        return view('votes.edit',compact('vote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numeroCarte' => 'unique:votes|required|max:9999|integer',
            'telephone' => 'required|max:9',
            'president' => 'required',
            ]);
        $vote = vote::find($id);
        $vote->numeroCarte = $request->numeroCarte;
        $vote->president = $request->president;
        $vote->telephone = $request->telephone;
        $vote->save();
        return redirect()->route('votes.index')
        ->with('success','Company Has Been updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(vote $vote)
    {
        $vote->delete();
        return redirect()->route('votes.index')
        ->with('success','vote has been delete successfully.');
    }
}
