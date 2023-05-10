<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChargeVoiture extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    public $timestamps = false;
    protected $table ="chargevoiture";
    protected $primaryKey ='idChargeVoiture';
    protected $cascadeDeletes = ['ChargesVoiture','voiture'];

    protected $fillable =[
        'idChargeVoiture',
        'idVoiture',
        'natureCharge',
        'idEntretient'	
    ];
   
    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
    public function ChargesVoiture()
    {
        return $this->hasMany(Charge::class);
    }
}
