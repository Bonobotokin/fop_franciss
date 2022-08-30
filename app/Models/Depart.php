<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;
    // protected $guarded = ['id_depart'];
    protected $primaryKey = 'id_depart';
    public $incrementing = true;
    protected $fillable = 
    [
        'numero_depart' ,
        'id_usager',
        'motif_depart',
    ];

    public function usager()
    {
        return $this->belongsTo(Usager::class, 'id_usager', 'id_usager');
    }


    public function etat_dossier()
    {
        return $this->hasMany(EtatDossier::class, 'id_depart', 'id_depart');
    }
}
