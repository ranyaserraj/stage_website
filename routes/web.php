<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HospitalizationReportController;
use App\Http\Controllers\FormController;


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



// routes/web.php

Route::get('/rendezvous', 'RendezVousController@index')->name('rendezvous.index');
// routes/web.php

Route::get('/factures', 'FactureController@index')->name('facture.index');

// routes/web.php

Route::get('/rapports', 'RapportController@index')->name('rapport.index');
Route::get('/rendezvous', 'App\Http\Controllers\RendezVousController@index')->name('rendezvous.index');
Route::get('/rendezvous/create', 'App\Http\Controllers\RendezVousController@create')->name('rendezvous.create');


Route::post('/rendezvous', [RendezVousController::class, 'store'])->name('rendezvous.store');


//rapport 

// Affiche la liste des rapports
Route::get('/hospitalization-reports', [HospitalizationReportController::class, 'index'])->name('hospitalization-reports.index');

// Affiche le formulaire pour créer un nouveau rapport
Route::get('/hospitalization-reports/create', [HospitalizationReportController::class, 'create'])->name('hospitalization-reports.create');

// Enregistre un nouveau rapport dans la base de données
Route::post('/hospitalization-reports', [HospitalizationReportController::class, 'store'])->name('hospitalization-reports.store');

// Affiche les détails d'un rapport spécifique
Route::get('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'show'])->name('hospitalization-reports.show');

// Affiche le formulaire pour modifier un rapport existant
Route::get('/hospitalization-reports/{hospitalizationReport}/edit', [HospitalizationReportController::class, 'edit'])->name('hospitalization-reports.edit');

// Met à jour un rapport existant dans la base de données
Route::put('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'update'])->name('hospitalization-reports.update');

// Supprime un rapport existant de la base de données
Route::delete('/hospitalization-reports/{hospitalizationReport}', [HospitalizationReportController::class, 'destroy'])->name('hospitalization-reports.destroy');


Route::post('/submit-form', [FormController::class, 'submit'])->name('form.submit');
Route::get('/hospitalization-reports/{id}/pdf', [HospitalizationReportController::class, 'generatePdf'])->name('hospitalization-reports.generatePdf');