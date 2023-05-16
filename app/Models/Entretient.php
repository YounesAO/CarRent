<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
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
    public function pieces() :CastsAttribute {
        return new CastsAttribute(
            get:fn()=> Piece::whereIn('idPiece',$this->pieceChangee()->pluck('idPiece')->toArray())->get('nom')
        );
    }
        
}
