<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appo;
use App\Models\Patient;
use App\Models\Acte;

class AppointmentControllerNew extends Controller
{
    // Afficher la liste des rendez-vous
    public function index(Request $request)
    {
        $query = Appo::query();
    
        // Filtrer par date et heure
        if ($request->has('date_heure') && !empty($request->input('date_heure'))) {
            $query->whereDate('Date_heure_', $request->input('date_heure'));
        }
    
        // Filtrer par nom du patient
        if ($request->has('nom_patient') && !empty($request->input('nom_patient'))) {
            $query->where('nom_patient_', 'like', '%' . $request->input('nom_patient') . '%');
        }
    
        // Filtrer par nom du médecin
        if ($request->has('nom_medecin') && !empty($request->input('nom_medecin'))) {
            $query->where('nom_medecin_', 'like', '%' . $request->input('nom_medecin') . '%');
        }
    
        $appointments = $query->get();
    
        return view('rendezvous.index', compact('appointments'));
    }
    
    // Afficher le formulaire de création d'un rendez-vous
    public function create()
    {
        $actes = Acte::all();
        $patients = Patient::all();
        return view('rendezvous.create', compact('actes', 'patients'));
    }

    // Enregistrer un nouveau rendez-vous
    public function store(Request $request)
    {
        $request->validate([
            'Date_heure_' => 'required|date',
            'nom_patient_' => 'required|string',
            'nom_medecin_' => 'required|string',
            'nom_secretaire_' => 'required|string',
            'nom_acte_' => 'required|string',
        ]);
    
        Appo::create([
            'Date_heure_' => $request->input('Date_heure_'),
            'nom_patient_' => $request->input('nom_patient_'),
            'nom_medecin_' => $request->input('nom_medecin_'),
            'nom_secretaire_' => $request->input('nom_secretaire_'),
            'nom_acte_' => $request->input('nom_acte_'),
        ]);
    
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous créé avec succès.');
    }
    
    // Afficher un rendez-vous spécifique
    public function show($id)
    {
        $rdv = Appo::findOrFail($id);
        return view('rendezvous.show', compact('rdv'));
    }

    // Afficher le formulaire de modification d'un rendez-vous
    public function edit($id)
    {
        $rdv= Appo::findOrFail($id);
        $actes = Acte::all(); // Ajouter pour afficher les actes dans le formulaire d'édition
        $patients = Patient::all(); // Ajouter pour afficher les patients dans le formulaire d'édition
        return view('rendezvous.edit', compact('rdv', 'actes', 'patients'));
    }

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        $request->validate([
            'Date_heure_' => 'required|date',
            'nom_patient_' => 'required|string',
            'nom_medecin_' => 'required|string',
            'nom_secretaire_' => 'required|string',
            'nom_acte_' => 'required|string',
        ]);

        $appointment = Appo::findOrFail($id);
        $appointment->update([
            'Date_heure_' => $request->input('Date_heure_'),
            'nom_patient_' => $request->input('nom_patient_'),
            'nom_medecin_' => $request->input('nom_medecin_'),
            'nom_secretaire_' => $request->input('nom_secretaire_'),
            'nom_acte_' => $request->input('nom_acte_'),
        ]);

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    // Supprimer un rendez-vous
    public function destroy($id)
    {
        $appointment = Appo::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }
}
