<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charge extends Model
{
    use HasFactory;
    use SoftDeletes;

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
    public function ChargesVoiture()
    {
        return $this->hasOne(ChargeVoiture::class,'idChargeVoiture');
    }
    
    
    
    protected function chargeVoiture(): Attribute
    {
        return new Attribute(
            get: fn () => (ChargeVoiture::where('idChargeVoiture',$this->idChargeVoiture)->first() )
            
        );
    }
    protected function chargeEntreprise(): Attribute
    {
        return new Attribute(
            get: fn () => (chargeEntreprise::where('idChargeEntreprise',$this->idChargeEntreprise)->first())
            
        );
    }
    

}
