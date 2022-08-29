<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usager extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_usager';
    public $incrementing = true;
    protected $fillable = 
    [
        'im_usager' ,
        'nom_usager',
        'telephone_usager'
    ];

    public function etat_dossier()
    {
        return $this->hasMany(EtatDossier::class, 'id_usager', 'id_usager');
    }
    public function arriver()
    {
        return $this->hasMany(Arriver::class, 'id_usager', 'id_usager');
    }

    public function depart()
    {
        return $this->hasMany(Depart::class, 'id_usager', 'id_usager');
    }

    public function transmission()
    {
        return $this->hasMany(Transmission::class, 'id_usager', 'id_usager');
    }
}

