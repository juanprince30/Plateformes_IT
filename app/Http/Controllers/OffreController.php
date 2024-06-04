<?php

namespace App\Http\Controllers;

use App\Events\UserInteractedWithOffres;
use App\Models\Offre;
use App\Models\UserInteraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    protected $user;
    protected $interactionLimit = 50; // Limite des interactions utilisateur

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offres = Offre::all();
        return view('offres.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'type_offre' => 'required|max:255',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'salaire' => 'required|numeric',
            'experience_requis' => 'required|max:255',
            'responsabilite' => 'required',
            'competence_requis' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'profil_id' => 'required|exists:profils,id',
        ]);

        $offre = Offre::create($validated);

        return redirect()->route('offres.show', $offre->id)
                         ->with('success', 'Offre créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offre = Offre::findOrFail($id);
        $user = Auth::user();

        // Vérifier si la limite des interactions est atteinte
         if ($this->user->interactions()->count() >= $this->interactionLimit) {
            // Supprimer l'interaction la plus ancienne
            $this->user->interactions()->orderBy('created_at')->first()->delete();
        }

        // Enregistrer l'interaction de l'utilisateur
        UserInteraction::create([
            'user_id' => $user->id,
            'offre_id' => $offre->id,
        ]);

        // Déclenchement de l'événement
        event(new UserInteractedWithOffres($user, $offre));

        return view('offres.show', compact('offre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offre $offre)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'type_offre' => 'required|max:255',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'salaire' => 'required|numeric',
            'experience_requis' => 'required|max:255',
            'responsabilite' => 'required',
            'competence_requis' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'profil_id' => 'required|exists:profils,id',
        ]);

        $offre->update($validated);

        return redirect()->route('offres.show', $offre->id)
                         ->with('success', 'Offre mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offres.index')
                         ->with('success', 'Offre supprimée avec succès.');
    }
}
