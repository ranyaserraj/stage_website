<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'Patient';
    protected $primaryKey = 'id_p';
    protected $fillable = [
        'Nom_p',
        'Prenom_p',
        'Adresse_p',
        'Date_Naissance_p',
        'Sexe_p',
        'Telephone_p',
        'Email_p',
        'Situation_Familiale',
        'id_imm_assurance'
    ];

    // Relation avec les rendez-vous
    
    public function appos()
    {
        return $this->hasMany(Appo::class, 'patient_id'); // Assurez-vous que 'patient_id' est bien le champ de clé étrangère
    }
    // Ajoutez d'autres relations au besoin
}
