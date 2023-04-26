<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeVoiture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table ="chargevoiture";
    protected $primaryKey ='idChargeVoiture';

    protected $fillable =[
        'idChargeVoiture',
        'idVoiture',
        'natureEntretient',
        'idEntretient'	
    ];
}
