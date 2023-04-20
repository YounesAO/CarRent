<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $table = 'Voiture';
    protected $fillable = [
        'id', 'immatricule','dateDachat','nbportes' ,
        'nbPlaces',
        'kilometrage',
        'image',
        'idModel'
    ];
}
