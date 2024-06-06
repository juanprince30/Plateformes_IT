<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route pour la recherche de catégories dans l'API
Route::get('/categorie/search', [CategorieController::class, 'search'])->name('api.categorie.search');