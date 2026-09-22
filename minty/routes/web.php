<?php

use App\Http\Controllers\CarteController;
use App\Http\Controllers\CarteUtilisateurController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\JeuController;
use App\Http\Controllers\TypeSwuController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('jeux', JeuController::class)->parameters([
    'jeux' => 'jeu',
]);
Route::resource('extensions', ExtensionController::class);
Route::resource('utilisateurs', UtilisateurController::class);
Route::resource('cartes', CarteController::class);
Route::resource('type-swu', TypeSwuController::class)->parameters([
    'type-swu' => 'typeSwu',
]);
Route::resource('carte-utilisateur', CarteUtilisateurController::class)->parameters([
    'carte-utilisateur' => 'carteUtilisateur',
]);
