<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use App\Models\Acte;

class RendezVousController extends Controller
{
    public function index()
    {
        $rendezVous = RendezVous::all();
        return view('rendezvous.index', compact('rendezVous'));
    }

    public function create()
    {
        $patients = Patient::all(); // Récupérer tous les patients depuis la base de données
        $actes = Acte::all();
        return view('rendezvous.create', [
            'patients' => $patients,
            'actes' => $actes,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Date_heure' => 'required|date',
            'id_p' => 'required|exists:patients,id',
            'id_m' => 'required|exists:medecins,id',
            'id_s' => 'required|exists:secretaires,id',
            'id_a' => 'nullable|exists:actes,id',
            // Ajoutez les autres champs avec leurs règles de validation
        ]);

        RendezVous::create($validatedData);

        return redirect()->route('rendez-vous.index')
            ->with('success', 'Rendez-vous ajouté avec succès.');
    }

    // Implémentez les méthodes show, edit, update, destroy de manière similaire
}

