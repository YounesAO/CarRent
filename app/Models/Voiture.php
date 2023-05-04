<?php

namespace App\Models;

use App\Http\Controllers\EntretientController;
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
        'FWD',
        'AC',
        'auto',
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

    protected function disponible(): Attribute
    {
        return new Attribute(
            get: fn () => 
                ($this->status==null || ($this->status!=null && strtotime($this->status->dateRetour)<time())?true:false)
            
        );
    }
    protected function entretients(): Attribute
    {
        return new Attribute(
            get: fn () => array_filter(EntretientController::entretiens($this), function($value) {
                return $value == "red";
            })
            
        );
    }
    


}