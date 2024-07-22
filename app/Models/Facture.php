<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['appo_id', 'total'];

    public function appo()
    {
        return $this->belongsTo(Appo::class, 'appo_id');
    }
}
