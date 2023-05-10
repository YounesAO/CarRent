<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modele extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'model';
    protected $primaryKey ='idModel';
    public $timestamps = false;

    protected $fillable = ['idModel','idMarque','model','annee' ];
    public function cars()
    {
        $this->hasmany(Voiture::class,'idModel');
    }
}
