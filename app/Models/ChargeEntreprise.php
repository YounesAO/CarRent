<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPSTORM_META\type;

class ChargeEntreprise extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $table = "chargeentreprise";
    protected $fillable = [
        'idChargeEntreprise',
        'idTypeCharge'
    ];
    public function charge()
    {
        return $this->hasOne(charge::class,'idChargeEntreprise');
    }
    protected function typeCharge(): Attribute
    {
        return new Attribute(
            get: fn () => (TypeCharge::where('idTypeCharge',$this->idTypeCharge)->first())
            
        );
    }
}
