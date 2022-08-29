<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arriver extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_arriver';
    public $incrementing = true;
    protected $fillable = 
    [
        'numero_arriver' ,
        'id_usager',
        'objet_arriver',
        'destinateur_arriver'
    ];

    public function usager()
    {
        return $this->belongsTo(Usager::class, 'id_usager', 'id_usager');
    }

    public function etat_dossier()
    {
        return $this->hasMany(EtatDossier::class, 'id_arriver', 'id_arriver');
    }
}
