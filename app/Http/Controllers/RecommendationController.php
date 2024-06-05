<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer l'utilisateur actuellement connecté
        $user = Auth::user();

        // Récupérer les recommandations de l'utilisateur actuellement connecté
        $recommendations = $user->recommendations()->pluck('offre_id');

        // Récupérer les offres dont les IDs se trouvent dans les recommandations
        $offres = Offre::whereIn('id', $recommendations)->get();


        // Retourner la vue avec les données des offres
        return view('recommendation.index', ['offres' => $offres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recommendation $recommendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recommendation $recommendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        //
    }
}
