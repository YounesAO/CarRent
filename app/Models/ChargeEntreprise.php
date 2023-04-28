<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeEntreprise extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "chargeentreprise";
    protected $fillable = [
        'idChargeEntreprise',
        'idTypeCharge'
    ];
}
