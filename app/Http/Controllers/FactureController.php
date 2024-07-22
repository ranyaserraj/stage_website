<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appo;
use App\Models\Facture;
use App\Models\Patient;
use App\Models\Acte;
use PDF;

class FactureController extends Controller
{
    // Afficher la liste des factures
    public function index()
    {
        $appos = Appo::all();
        $factures = [];

        foreach ($appos as $appo) {
            $acte = $appo->acte(); // Obtenir l'acte correspondant
            $total = $acte ? $acte->cout : 0;
            $factures[] = [
                'appo' => $appo,
                'total' => $total,
            ];
        }

        return view('factures.index', compact('factures'));
    }

    // Générer un PDF pour une facture spécifique
    public function generatePDF($id)
    {
        $appo = Appo::findOrFail($id);
        $acte = $appo->acte(); // Obtenir l'acte correspondant
        $total = $acte ? $acte->cout : 0;

        $pdf = PDF::loadView('factures.pdf', compact('appo', 'total'));

        return $pdf->download('facture.pdf');
    }
}
