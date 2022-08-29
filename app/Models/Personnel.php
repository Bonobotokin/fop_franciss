<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_personnel';
    public $incrementing = true;
    protected $fillable = 
    [
        'im_personnel' ,
        'nom_personnel',
        'fonction_personnel',
        'telephone_personnel' 
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_personnel', 'id_personnel');
    }

    public function etat_dossier()
    {
        return $this->hasMany(EtatDossier::class, 'id_personnel', 'id_personnel');
    }
}
