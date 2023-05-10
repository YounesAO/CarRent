<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entretient extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='entretient';
    protected $primaryKey ='idEntretient';

    protected $fillable=[
        'idEntretient' ,
        'nomAtelier' ,
        'adresse' ,
        'montant' ,
        'kilometrage',
        'date',
    ] ;

    public function pieceChangee()
    {
        return $this->hasMany(PieceChangee::class,'idEntretient');
    }
    public function chargevoiture()
    {
        return $this->hasMany(ChargeVoiture::class,'idEntretient');
    }
}
