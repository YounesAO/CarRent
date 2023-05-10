<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'client';
    protected $primaryKey ='idClient';

    protected $fillable = [
        'idClient', 
        'nomClient',
        'prenomClient',
        'CIN' ,
        'dateNaissance',
        'adresseClient',
        'nationalite',
        'photoCIN',
        'idPermis'
    ];
    public function reservations()
    {
        return $this->hasMany(Reservation::class,'idClient');
    }
    public function permis():Attribute {
        return new Attribute(
            get:fn()=>Permis::where('idPermis',$this->idPermis)->first()
        );
    }
}
