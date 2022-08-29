<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArchivesController;
use App\Http\Controllers\PersonnelController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/listes/personnels', [PersonnelController::class, 'index'])->name('personnels.liste');
Route::get('/formulaire/personnels', [PersonnelController::class, 'create'])->name('personnels.create');
Route::post('/formulaire/personnels', [PersonnelController::class, 'store'])->name('personnels.store');
// Route::post('/formulaire/personnels/users', [PersonnelController::class, 'register'])->name('personnels.users.register');


/**
 * Archives
 * */ 


Route::get('/archives',[ArchivesController::class, 'index'])->name('archives.listes');
Route::post('/nouveaux/dossier/archive/arriver',[ArchivesController::class, 'store'])->name('archive.store');
Route::post('/nouveaux/dossier/archive/depart',[ArchivesController::class, 'storeDepart'])->name('archive.store.departement');


