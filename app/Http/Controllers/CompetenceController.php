<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Categorie;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        
        $competences=Competence::all();
        
        return view('competence.index',compact('competences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('competence.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'titre'=>'required',
            'categorie_id'=>'required',
        ]);

        $user_id=Auth::id();
        $profil= Profil::where('user_id',$user_id)->first();
        $input=$request->all();
        $input['profil_id']=$profil->id;

        Competence::create($input);
        
        return redirect()->route('competence.index');
    }

    public function edit(Competence $competence)
    {
        $categories = Categorie::all();
        return view('competence.edit', compact('competence', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competence $competence)
    {
        request()->validate([
            'titre' => 'required',
            'categorie_id' => 'required',
        ]);

        $competence->update($request->all());

        return redirect()->route('competence.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competence $competence)
    {
        return view('competence.show', compact('competence'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Competence::destroy($id);
        return redirect()->route('competence.index');
    }
}
