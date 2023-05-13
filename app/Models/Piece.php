<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Piece extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'piece';
    protected $primaryKey ='idPiece';
    public $timestamps = false;

    protected $fillable=[
        'idPiece',
        'nom',
        'img',
        'prix',
        'description',
        'maxKilo',
        'maxDurre'
    ];

}
