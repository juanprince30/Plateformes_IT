<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\OffreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route pour la recherche de catégories dans l'API
Route::get('/categorie/search', [CategorieController::class, 'search'])->name('api.categorie.search');

Route::get('/discussions/search', [DiscussionController::class, 'search'])->name('api.discussions.search');

Route::get('/offres/{type}', [OffreController::class, 'filterByType'])->name('api.offres.filterByType');
Route::get('/offres', function () {
    $offres = App\Models\Offre::query();

    if (request()->has('all') && request()->get('all') == 'true') {
        // Chargez toutes les offres si le paramètre 'all' est défini à true
        $offres = $offres->where('etat_offre', 'Offre publiée')->paginate(10); // Modifier la pagination selon vos besoins
    } else {
        // Chargez les offres normalement
        $offres = $offres->where('etat_offre', 'Offre publiée')->paginate(7); // Modifier la pagination selon vos besoins
    }

    return view('offre.index', compact('offres'));
})->name('offres.index');
