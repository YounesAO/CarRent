<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $primaryKey ='idReservation';
    public $timestamps = false;


    protected $fillable = [
        'idReservation',	
        'idClient',	
        'idVoiture',	
        'dateDebut',	
        'dateRetour',	
        'distance',
        'prix',	
        'idPaiement' ];

    protected function voiture(): Attribute
    {
        return new Attribute(
            get: fn () =>Voiture::where('id',$this->idVoiture)->first()
        );
    }

    protected function client(): Attribute
    {
        return new Attribute(
            get: fn () =>Client::where('idClient',$this->idClient)->first()
        );
    }
    protected function duree(): Attribute
    {
        return new Attribute(
            get: fn () =>(date_diff(date_create($this->dateRetour) ,date_create($this->dateDebut))->format("%d"))
        );
    }
    protected function montant(): Attribute
    {
        return new Attribute(
            get: fn () =>($this->duree * $this->prix)
        );
    }
    protected function encours(): Attribute
    {
        return new Attribute(
            get: fn () =>($this->voiture->disponible)
        );
    }
    protected function paiement(): Attribute
    {
        return new Attribute(
            get: fn () =>Paiement::where('idPaiement',$this->idPaiement)->first()
        );
    }
}
