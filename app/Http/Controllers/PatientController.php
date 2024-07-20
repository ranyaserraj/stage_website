<?php
namespace App\Http\Controllers;
use App\Models\Patient;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
{
    $query = Patient::query();

    if ($request->filled('nom')) {
        $query->where('Nom_p', 'like', '%' . $request->input('nom') . '%');
    }
    if ($request->filled('prenom')) {
        $query->where('Prenom_p', 'like', '%' . $request->input('prenom') . '%');
    }
    if ($request->filled('adresse')) {
        $query->where('Adresse_p', 'like', '%' . $request->input('adresse') . '%');
    }
    if ($request->filled('date_naissance')) {
        $query->whereDate('Date_Naissance_p', $request->input('date_naissance'));
    }
    if ($request->filled('sexe')) {
        $query->where('Sexe_p', $request->input('sexe'));
    }
    if ($request->filled('telephone')) {
        $query->where('Telephone_p', 'like', '%' . $request->input('telephone') . '%');
    }
    if ($request->filled('email')) {
        $query->where('Email_p', 'like', '%' . $request->input('email') . '%');
    }

    $patients = $query->get();

    return view('patients.index', compact('patients'));
}

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'Nom_p' => 'required|string',
        'Prenom_p' => 'required|string',
        'Adresse_p' => 'required|string',
        'Date_Naissance_p' => 'required|date',
        'Sexe_p' => 'required|string',
        'Telephone_p' => 'required|string',
        'Email_p' => 'required|email',
        'Situation_Familiale' => 'required|string',
        'id_imm_assurance' => 'required|string',
            // Ajoutez les autres champs avec leurs règles de validation
        ]);

        Patient::create($validatedData);

        return redirect()->route('patients.index')
            ->with('success', 'Patient ajouté avec succès.');
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nom_p' => 'required|string',
        'Prenom_p' => 'required|string',
        'Adresse_p' => 'required|string',
        'Date_Naissance_p' => 'required|date',
        'Sexe_p' => 'required|string',
        'Telephone_p' => 'required|string',
        'Email_p' => 'required|email',
        'Situation_Familiale' => 'required|string',
        'id_imm_assurance' => 'required|string',
            // Ajoutez les autres champs avec leurs règles de validation
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($validatedData);

        return redirect()->route('patients.index')
            ->with('success', 'Patient modifié avec succès.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient supprimé avec succès.');
    }
}
