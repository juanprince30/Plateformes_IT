<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Competence;
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
        $user_id= Auth::id();
        $profil=Profil::where('user_id',$user_id)->first();
        $competence=Competence::where('profil_id',$profil->id)->get();
        
        return view('competence.index', compact('competence'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie=Categorie::select('id','libelle')->get();
        
        return view('competence.create', compact('categorie'));
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
        if (!$user_id) {
            return redirect()->route('competence.index')->with('error', 'Utilisateur non authentifié');
        }
        $profil= Profil::where('user_id',$user_id)->first();
        $input=$request->all();
        $input['profil_id']=$profil->id;

        Competence::create($input);

        return redirect()->route('competence.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $competence=Competence::findOrFail($id);
        return view('competence.show', compact('competence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $competence=Competence::findOrFail($id);
        $categorie=Categorie::select('id','libelle')->get();

        return view('competence.edit', compact('competence', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $competence=Competence::findOrFail($id);
        
        $user_id=Auth::id();
        if (!$user_id) {
            return redirect()->route('competence.index')->with('error', 'Utilisateur non authentifié');
        }
        $profil= Profil::where('user_id',$user_id)->first();
        request()->validate([
            'titre'=>'required',
            'description'=>'required',
            'categorie_id'=>'required',
        ]);

        $input=$request->all();
        $input['profil_id']=$profil->id;

        $competence->update($input);
        return redirect()->route('competence.index');
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
