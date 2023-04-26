<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceChangee extends Model
{
    use HasFactory;
    protected $table='pieceChangee';
    public $timestamps = false;

    protected $fillable=[
        'idPiece',
        'idEntretient'	

    ];


}
