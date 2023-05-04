<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiement';
    public $timestamps = false;
    protected $primaryKey ='idPaiement';
    protected $fillable =[
        'idPaiement',
        'datePaiement',
        'montant',
        'idCheque'
    ];
    protected function cheque(): Attribute
    {
        return new Attribute(
            get: fn () =>Cheque::where('idCheque',$this->idCheque)->first()
        );
    }
}
