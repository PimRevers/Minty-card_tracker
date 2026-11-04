<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\CarteUtilisateurController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\JeuController;
use App\Http\Controllers\TypeSwuController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Minty Card Tracker
|--------------------------------------------------------------------------
*/

// Accueil & Dashboard (Google Stitch Design System)
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/mes-cartes', [DashboardController::class, 'mesCartes'])->name('mes-cartes');
Route::get('/profil', [DashboardController::class, 'profile'])->name('profil');

// Authentification (Vault Minty)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ressources TCG & Collections
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
