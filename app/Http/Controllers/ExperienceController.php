<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'entreprise' => 'required|string|max:100',
            'nom_superviseur' => 'nullable|string|max:100',
            'contact_superviseur' => 'nullable|string|max:255',
            'ville' => 'nullable|string',
            'responsabilite' => 'required|string',
            'description' => 'required|string',
            'travail_actuellement' => 'boolean',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);
        $user_id=Auth::id();
        $profil= Profil::where('user_id',$user_id)->first();
        $input=$request->all();
        $input['profil_id']=$profil->id;
// dd($input);
        Experience::create($input);

        return redirect()->route('experiences.index')->with('success', 'Experience created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        return view('experiences.show', compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'pays_id' => 'nullable|exists:pays,id',
            'titre' => 'required|string|max:255',
            'entreprise' => 'required|string|max:100',
            'nom_superviseur' => 'nullable|string|max:100',
            'contact_superviseur' => 'nullable|string|max:255',
            'ville' => 'nullable|integer',
            'responsabilite' => 'required|string',
            'description' => 'required|string',
            'travail_actuellement' => 'boolean',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $experience->update($request->all());

        return redirect()->route('experiences.index')->with('success', 'Experience updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'Experience deleted successfully.');
    }
}