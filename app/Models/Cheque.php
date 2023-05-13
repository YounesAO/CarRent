<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cheque extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cheque';
    public $timestamps = false;
    protected $primaryKey ='idCheque';
    protected $fillable =[
        'idCheque',
        'montant',	
        'dateCheque',
        'idClient'	
        
    ];
    protected function client(): Attribute
    {
        return new Attribute(
            get: fn () =>(Client::where('idClient',$this->idClient)->first())
        );
    }
    protected function encours(): Attribute
    {
        return new Attribute(
            get: fn () =>(strtotime($this->dateCheque)>time())?true:false
        );
    }
    protected function now(): Attribute
    {
        return new Attribute(
            get: fn () =>(($this->dateCheque)==date('Y-m-d'))?true:false
        );
    
    }
}
