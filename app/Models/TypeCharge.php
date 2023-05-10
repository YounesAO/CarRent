<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeCharge extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'TypeCharge';
    protected $fillable  = [
        'idTypeCharge',
        'nomCharge'
    ];

}
