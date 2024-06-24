<?php

namespace App\Http\Controllers;

use App\Models\Candidacture;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatures = Candidacture::where('user_id', Auth::id())->get();
        return view('postuler.index', compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $offreId = $request->query('offre');
        $offre = Offre::findOrFail($offreId);

        return view('postuler.create', compact('offre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'motivation' => 'required|string',
        'description' => 'nullable|string',
        'offre_id' => 'required|exists:offres,id',
    ]);
    $data['etat_candidature'] = 'En attente';
    $data['user_id'] = Auth::id();


    Candidacture::create($data);

    return redirect()->route('postuler.index')->with('message', 'Candidature soumise avec succès');
}


    /**
     * Display the specified resource.
     */
    public function show(Candidacture $candidature)
    {
        return view('postuler.show', ['candidature' => $candidature]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidacture $candidature)
    {
        return view('postuler.edit', ['candidature' => $candidature]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidacture $candidature)
    {
        $data = $request->validate([
            'motivation' => 'required|string',
            'description' => 'nullable|string',
            'offre_id' => 'required|exists:offres,id',
        ]);

        $data['user_id'] = Auth::id();

        $candidature->update($data);

        return redirect()->route('offres.show', ['offre' => $data['offre_id']])->with('message', 'Candidature mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateStatus(Request $request, $id)
    {
        $candidature = Candidacture::findOrFail($id);
        $offre = $candidature->offre;

        // Vérifiez si l'utilisateur connecté est le créateur de l'offre
        if (Auth::user()->id !== $offre->user_id) {
            return redirect()->route('offre.show', $offre->id)->with('error', 'Vous n\'êtes pas autorisé à modifier cette candidature.');
        }

        $request->validate([
            'etat_candidature' => 'required',
        ]);

        $candidature->etat_candidature = $request->input('etat_candidature');
        $candidature->save();

        return redirect()->route('offre.show', $offre->id)->with('success', 'État de la candidature mis à jour.');
    }
    public function destroy(Candidacture $candidature)
    {
        $candidature->delete();
        return redirect()->route('offres.index')->with('message', 'Candidature supprimée');
    }
}
