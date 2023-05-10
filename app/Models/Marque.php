<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marque extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='marque';
    protected $primaryKey ='idMarque';
    public $timestamps = false;

    protected $fillable = ['idMarque','marque' ];
   
    public function models()
    {
        return $this->hasMany(Modele::class,'idMarque');
    }
}
