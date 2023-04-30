<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $table = 'model';
    protected $primaryKey ='idModel';
    public $timestamps = false;

    protected $fillable = ['idModel','idMarque','model','annee' ];
}
