<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidactureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.main');
})->name('/');

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

Route::resource('offre', OffreController::class);

Route::middleware('auth')->group(function(){
    Route::get('mesoffre',[OffreController::class,'mesoffre'])->name('offre.mesoffre');

    Route::get('/showmesoffre/{offre}', [OffreController::class, 'showmesoffre'])->name('offre.showmesoffre');

    Route::get('/showmescandidat/{offre}', [OffreController::class, 'showmescandidat'])->name('offre.showmescandidat');
});


Route::middleware('auth')->group(function(){
    Route::get('postuler', [CandidactureController::class, 'index'])->name('postuler.index');
    Route::get('postuler/create', [CandidactureController::class, 'create'])->name('postuler.create');
    Route::post('postuler', [CandidactureController::class, 'store'])->name('postuler.store');
    Route::get('postuler/{candidature}', [CandidactureController::class, 'show'])->name('postuler.show');
    Route::get('postuler/{candidature}/edit', [CandidactureController::class, 'edit'])->name('postuler.edit');
    Route::put('postuler/{candidature}', [CandidactureController::class, 'update'])->name('postuler.update');
    Route::put('postuler/{candidature}', [CandidactureController::class, 'updateStatus'])->name('postuler.updateStatus');
    Route::delete('postuler/{candidature}', [CandidactureController::class, 'destroy'])->name('postuler.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('admin/offre', [OffreController::class, 'admin_offre'])->name('admin_offre');
    Route::get('admin/user', [OffreController::class, 'admin_user'])->name('admin_user');
});

Route::middleware('auth')->group(function(){
    Route::get('discussion', [DiscussionController::class, 'index'])->name('discussion.index');
    Route::get('discussion/create', [DiscussionController::class, 'create'])->name('discussion.create');
    Route::post('discussion', [DiscussionController::class, 'store'])->name('discussion.store');
    Route::get('/discussion/{id}', [DiscussionController::class, 'show'])->name('discussion.show');
    Route::get('/discussion/{id}/loadMore/{offset}', [DiscussionController::class, 'loadMore'])->name('discussion.loadMore');

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

// Route pour afficher la liste des événements
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Route pour afficher le formulaire de création d'un événement
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Route pour enregistrer un nouvel événement
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Route pour afficher les détails d'un événement spécifique
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Route pour afficher le formulaire de modification d'un événement
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route pour mettre à jour les informations d'un événement spécifique
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Route pour supprimer un événement spécifique
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');