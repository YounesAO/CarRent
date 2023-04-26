<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
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
