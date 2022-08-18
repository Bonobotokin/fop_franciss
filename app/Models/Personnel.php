<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'im_personnel' ,
        'nom_personnel',
        'fonction_personnel',
        'telephone_personnel' 
    ];


}
