<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CandidactureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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