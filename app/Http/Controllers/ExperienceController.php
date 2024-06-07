<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $user_id= Auth::id();
        $experience=Experience::where('user_id',$user_id)->get();
        
        return view('experience.index', compact('experience'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'entreprise' => 'required|string|max:100',
            'nom_superviseur' => 'nullable|string|max:100',
            'contact_superviseur' => 'nullable',
            'responsabilite' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $user_id= Auth::id();
        $input=$request->all();
        $input['user_id']=$user_id;

        Experience::create($input);

        return redirect()->route('experience.index')->with('success', 'Experience creer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $experience=Experience::findOrFail($id);
        return view('experience.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $experience=Experience::findOrFail($id);
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $experience=Experience::findOrFail($id);
        $request->validate([
            'titre' => 'required',
            'entreprise' => 'required|string|max:100',
            'nom_superviseur' => 'required|string|max:100',
            'contact_superviseur' => 'required',
            'responsabilite' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $user_id= Auth::id();
        $input=$request->all();
        $input['user_id']=$user_id;

        $experience->update($input);

        return redirect()->route('experience.index')->with('success', 'Experience modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Experience::destroy($id);
        return redirect()->route('experience.index')->with('success','Experience supprimer avec succes');
    }
}
