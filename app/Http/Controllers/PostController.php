<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        
        $offres = Post::where('user_id', Auth::id())->paginate(10);
        

        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poste.create');
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
        $data['etat_post'] = 'en cours';

        Post::create($data);

        return redirect()->route('poste.index')->with('message', 'Poste créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $poste)
    {
        return view('poste.show', ['poste' => $poste]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $poste)
    {
        return view('poste.edit', ['poste' => $poste]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $poste)
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
        $data['etat_post'] = 'en cours';

        $poste->update($data);

        return redirect()->route('poste.show', $poste)->with('message', 'Poste mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $poste)
    {
        $poste->delete();
        return redirect()->route('poste.index')->with('message', 'Poste supprimé avec succès.');
    }
}
