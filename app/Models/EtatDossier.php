<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatDossier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_etat_dosiier';
    public $incrementing = true;
    protected $fillable = 
    [
        'id_usager',
        'id_arriver' ,
        'id_depart',
        'id_transmission',
        'id_personnel'
    ];
    public function usager()
    {
        return $this->belongsTo(Usager::class, 'id_usager', 'id_usager');
    }

    public function arriver()
    {
        return $this->belongsTo(Arriver::class, 'id_arriver', 'id_arriver');
    }
    public function depart()
    {
        return $this->belongsTo(Depart::class, 'id_depart', 'id_depart');
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'id_transmission', 'id_transmission');
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel', 'id_personnel');
    }
}
