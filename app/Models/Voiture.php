<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class Voiture extends Model
{
    use HasFactory;
    protected $table = 'Voiture';
    
    protected $fillable = [
        'id', 
        'immatricule',
        'dateDachat',
        'nbportes' ,
        'nbPlaces',
        'kilometrage',
        'image',
        'carburant',
        'idModel'
    ];
    
    protected function model(): Attribute
    {
        return new Attribute(
            get: fn () =>Modele::where('idModel',$this->idModel)->first()
        );
    }

    protected function marque(): Attribute
    {
        return new Attribute(
            get: fn () => marque::where('idMarque',$this->model->idMarque)->first()
        );
    }
    protected function status(): Attribute
    {
        return new Attribute(
            get: fn () => Reservation::where('idVoiture',$this->id)->first()
            
        );
    }
}

