<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acte extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_a'; // Définir la clé primaire personnalisée si nécessaire

    protected $fillable = [
        'cout',
        'description',
    ];

    // Si vous n'avez pas besoin de gérer manuellement les timestamps
    // public $timestamps = false;

    // Définir les relations s'il y en a
    // Exemple de relation avec d'autres modèles :
    // public function rendezvous()
    // {
    //     return $this->hasMany(RendezVous::class, 'id_a', 'id_a');
    // }
}
