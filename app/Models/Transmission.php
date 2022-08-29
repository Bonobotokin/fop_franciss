<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transmission';
    public $incrementing = true;
    protected $fillable = 
    [
        'numero_transmission' ,
        'id_usager',
        'objet_depart',
    ];

    public function usager()
    {
        return $this->belongsTo(Usager::class, 'id_usager', 'id_usager');
    }

    public function etat_dossier()
    {
        return $this->hasMany(EtatDossier::class, 'id_transmission', 'id_transmission');
    }
}
