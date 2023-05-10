<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PieceChangee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='pieceChangee';
    public $timestamps = false;

    protected $fillable=[
        'idPiece',
        'idEntretient'	

    ];
    


}
