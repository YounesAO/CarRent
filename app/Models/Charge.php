<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='charge';
    protected $primaryKey ='idCharge';

    protected $fillable=[
        'idCharge',
        'categorieCharge',
        'dateCharge',	
        'montant',
        'idChargeEntreprise',
        'idChargeVoiture'
    ];
    
}
