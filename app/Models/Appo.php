<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appo extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date_heure_', 'nom_patient_', 'nom_medecin_', 'nom_secretaire_', 'nom_acte_'
        // Ajoutez ici tous les autres champs que vous souhaitez remplir
    ];

    protected $table = 'appo'; // Assurez-vous que la table correspond au nom de votre migration

    // Définir d'autres relations si nécessaire, par exemple avec Patient, Medecin, Secretaire, etc.
    public function acte()
    {
        return Acte::where('description', $this->nom_acte_)->first();
    }
    }
