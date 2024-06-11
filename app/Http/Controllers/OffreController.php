<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
            
        $offres = Offre::paginate(10);
        

        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('offre.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'type_offre' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'salaire' => 'required|string',
            'experience_requis' => 'required|string',
            'responsabilite' => 'required|string',
            'competence_requis' => 'required|string',
            'date_debut_offre' => 'required|date',
            'date_fin_offre' => 'required|date',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        $data['user_id'] = Auth::id();
        $data['etat_offre'] = 'en cours';

        
        $offre=Offre::create($data);
        return redirect()->route('offre.index', $offre)->with('message', 'Offre créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offre = Offre::with('candidacture')->findOrFail($id);
        return view('offre.show', ['offre' => $offre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offre $offre)
    {
        return view('offre.edit', ['offre' => $offre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $data = $request->validate([
            'titre' => 'required|string|max:255',
            'type_offre' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'salaire' => 'required|string',
            'experience_requis' => 'required|string',
            'responsabilite' => 'required|string',
            'competence_requis' => 'required|string',
            'date_debut_offre' => 'required|date',
            'date_fin_offre' => 'required|date',
            'categorie_id' => 'required|integer|exists:categories,id',
        ]);

        $data['user_id'] = Auth::id();
        $data['etat_offre'] = 'en cours';

        $offre->update($data);

        return redirect()->route('offre.show', $offre)->with('message', 'Offre mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('offre.index')->with('message', 'Offre supprimée avec succès.');
    }

    public function mesoffre(){
        $offres = Offre::where('user_id', Auth::id())->paginate(10);
        return view('offre.mesoffre', compact('offres'));
    }

    public function showmesoffre($id){
        $offre = Offre::findOrFail($id);
        $offres = Offre::all();
        return view('offre.showmesoffre', compact('offre', 'offres'));
    }
}
