<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_dossier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_etat_dosiier';
    public $incrementing = true;
    protected $fillable = 
    [
        'id_arriver' ,
        'id_depart',
        'id_transmission',
        'id_personnel'
    ];

    public function arriver()
    {
        return $this->hasOne(Arriver::class, 'id_arriver', 'id_arriver');
    }
}
