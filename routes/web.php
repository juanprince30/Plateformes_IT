<?php

use App\Http\Controllers\CandidactureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReponseController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});






Route::middleware('auth')->group(function(){
    Route::get('discussion', [DiscussionController::class, 'index'])->name('discussion.index');
    Route::get('discussion/create', [DiscussionController::class, 'create'])->name('discussion.create');
    Route::post('discussion', [DiscussionController::class, 'store'])->name('discussion.store');
    Route::get('discussion/{discussion}', [DiscussionController::class, 'show'])->name('discussion.show');
    Route::get('discussion/{discussion}/edit', [DiscussionController::class, 'edit'])->name('discussion.edit');
    Route::put('discussion/{discussion}', [DiscussionController::class, 'update'])->name('discussion.update');
    Route::delete('discussion/{discussion}', [DiscussionController::class, 'destroy'])->name('discussion.destroy');
});



Route::middleware('auth')->group(function(){
    Route::get('reponse', [ReponseController::class, 'index'])->name('reponse.index');
    Route::get('/reponse/create/{discussion_id}', [App\Http\Controllers\ReponseController::class, 'create'])->name('reponse.create');
    Route::post('reponse', [ReponseController::class, 'store'])->name('reponse.store');
    Route::get('reponse/{reponse}', [ReponseController::class, 'show'])->name('reponse.show');
    Route::get('reponse/{reponse}/edit', [ReponseController::class, 'edit'])->name('reponse.edit');
    Route::put('reponse/{reponse}', [ReponseController::class, 'update'])->name('reponse.update');
    Route::delete('reponse/{reponse}', [ReponseController::class, 'destroy'])->name('reponse.destroy');
});






/* Route::resource('offre', OffreController::class);
Route::get('mesoffre',[OffreController::class,'mesoffre'])->name('offre.mesoffre');
Route::get('/showmesoffre/{offre}', [OffreController::class, 'showmesoffre'])->name('offre.showmesoffre'); */
Route::get('offre', [OffreController::class, 'index'])->name('offre.index');

// Afficher le formulaire de création d'une offre
Route::get('offre/create', [OffreController::class, 'create'])->name('offre.create');

// Enregistrer une nouvelle offre
Route::post('offre', [OffreController::class, 'store'])->name('offre.store');

// Afficher les détails d'une offre
Route::get('offre/{offre}', [OffreController::class, 'show'])->name('offre.show');

// Afficher le formulaire de modification d'une offre
Route::get('showmesoffre/{offre}/edit', [OffreController::class, 'edit'])->name('offre.edit');

// Mettre à jour une offre existante
Route::put('offre/{offre}', [OffreController::class, 'update'])->name('offre.update');

// Supprimer une offre
Route::delete('offre/{offre}', [OffreController::class, 'destroy'])->name('offre.destroy');

// Route pour afficher les offres de l'utilisateur connecté
Route::get('mesoffre', [OffreController::class, 'mesoffre'])->name('offre.mesoffre');

// Route pour afficher les détails des offres de l'utilisateur connecté
Route::get('showmesoffre/{offre}', [OffreController::class, 'showmesoffre'])->name('offre.showmesoffre');

Route::middleware('auth')->group(function(){

    Route::get('postuler', [CandidactureController::class, 'index'])->name('postuler.index');
    Route::get('postuler/create', [CandidactureController::class, 'create'])->name('postuler.create');
    Route::post('postuler', [CandidactureController::class, 'store'])->name('postuler.store');
    Route::get('postuler/{candidature}', [CandidactureController::class, 'show'])->name('postuler.show');
    Route::get('postuler/{candidature}/edit', [CandidactureController::class, 'edit'])->name('postuler.edit');
    Route::put('postuler/{candidature}', [CandidactureController::class, 'update'])->name('postuler.update');
    Route::delete('postuler/{candidature}', [CandidactureController::class, 'destroy'])->name('postuler.destroy');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('/categorie', App\Http\Controllers\CategorieController::class);

Route::resource('/competence',App\Http\Controllers\CompetenceController::class);

Route::resource('/experience', App\Http\Controllers\ExperienceController::class);

Route::resource('/certification', App\Http\Controllers\CertificationController::class);

Route::resource('/cv_et_motivation', App\Http\Controllers\CvEtMotivationController::class);