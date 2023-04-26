<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entretient extends Model
{
    use HasFactory;
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
}
