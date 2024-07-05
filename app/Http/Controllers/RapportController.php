<?php
namespace App\Http\Controllers;

use App\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        $rapports = Rapport::all();
        return view('rapports.index', compact('rapports'));
    }

    public function create()
    {
        return view('rapports.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_p' => 'required|exists:patients,id',
            'contenu' => 'required',
            'id_m' => 'required|exists:medecins,id',
            // Ajoutez les autres champs avec leurs règles de validation
        ]);

        Rapport::create($validatedData);

        return redirect()->route('rapports.index')
            ->with('success', 'Rapport ajouté avec succès.');
    }

    public function show($id)
    {
        $rapport = Rapport::findOrFail($id);
        return view('rapports.show', compact('rapport'));
    }

    public function edit($id)
    {
        $rapport = Rapport::findOrFail($id);
        return view('rapports.edit', compact('rapport'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_p' => 'required|exists:patients,id',
            'contenu' => 'required',
            'id_m' => 'required|exists:medecins,id',
            // Ajoutez les autres champs avec leurs règles de validation
        ]);

        $rapport = Rapport::findOrFail($id);
        $rapport->update($validatedData);

        return redirect()->route('rapports.index')
            ->with('success', 'Rapport modifié avec succès.');
    }

    public function destroy($id)
    {
        $rapport = Rapport::findOrFail($id);
        $rapport->delete();

        return redirect()->route('rapports.index')
            ->with('success', 'Rapport supprimé avec succès.');
    }
}
