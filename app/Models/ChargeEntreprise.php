<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class ChargeEntreprise extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "chargeentreprise";
    protected $fillable = [
        'idChargeEntreprise',
        'idTypeCharge'
    ];
    protected function typeCharge(): Attribute
    {
        return new Attribute(
            get: fn () => (TypeCharge::where('idTypeCharge',$this->idTypeCharge)->first())
            
        );
    }
}
