<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCharge extends Model
{
    use HasFactory;
    protected $table = 'TypeCharge';
    protected $fillable  = [
        'idTypeCharge',
        'nomCharge'
    ];

}
