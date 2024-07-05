<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\RapportController;



// Routes pour les patients
Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('patients.update');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');


// Routes pour les rendez-vous
Route::get('/rendez-vous', [RendezVousController::class, 'index'])->name('rendez-vous.index');
Route::get('/rendez-vous/create', [RendezVousController::class, 'create'])->name('rendez-vous.create');
Route::post('/rendez-vous', [RendezVousController::class, 'store'])->name('rendez-vous.store');
Route::get('/rendez-vous/{id}', [RendezVousController::class, 'show'])->name('rendez-vous.show');
Route::get('/rendez-vous/{id}/edit', [RendezVousController::class, 'edit'])->name('rendez-vous.edit');
Route::put('/rendez-vous/{id}', [RendezVousController::class, 'update'])->name('rendez-vous.update');
Route::delete('/rendez-vous/{id}', [RendezVousController::class, 'destroy'])->name('rendez-vous.destroy');

// Routes pour les factures
Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');
Route::get('/factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::post('/factures', [FactureController::class, 'store'])->name('factures.store');
Route::get('/factures/{id}', [FactureController::class, 'show'])->name('factures.show');
Route::get('/factures/{id}/edit', [FactureController::class, 'edit'])->name('factures.edit');
Route::put('/factures/{id}', [FactureController::class, 'update'])->name('factures.update');
Route::delete('/factures/{id}', [FactureController::class, 'destroy'])->name('factures.destroy');

// Routes pour les rapports
Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');
Route::get('/rapports/create', [RapportController::class, 'create'])->name('rapports.create');
Route::post('/rapports', [RapportController::class, 'store'])->name('rapports.store');
Route::get('/rapports/{id}', [RapportController::class, 'show'])->name('rapports.show');
Route::get('/rapports/{id}/edit', [RapportController::class, 'edit'])->name('rapports.edit');
Route::put('/rapports/{id}', [RapportController::class, 'update'])->name('rapports.update');
Route::delete('/rapports/{id}', [RapportController::class, 'destroy'])->name('rapports.destroy');
// routes/web.php

Route::get('/rendezvous', 'RendezVousController@index')->name('rendezvous.index');
// routes/web.php

Route::get('/factures', 'FactureController@index')->name('facture.index');

// routes/web.php

Route::get('/rapports', 'RapportController@index')->name('rapport.index');
Route::get('/rendezvous', 'App\Http\Controllers\RendezVousController@index')->name('rendezvous.index');
Route::get('/rendezvous/create', 'App\Http\Controllers\RendezVousController@create')->name('rendezvous.create');


Route::post('/rendezvous', [RendezVousController::class, 'store'])->name('rendezvous.store');
