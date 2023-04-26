<?php

namespace App\Http\Controllers;

use App\Models\Entretient;
use App\Models\Piece;
use App\Models\Voiture;
use Illuminate\Http\Request;

class EntretientController extends Controller
{
    public function index(){

        $cars = Voiture::all();
        return view('Pages.dashboard.entretient',['entretient'=>true,'voitures'=>$cars]);
    }
    public function fill(Voiture $voiture){
        $pieces = Piece::all();
        return view('Pages.dashboard.add-entretien',['car'=>$voiture,'pieces'=>$pieces]);
    }
    public function store(Request $request,$id)
    {
        $request->validate([
            'date'=> 'required',
            'idPiece[]'=>'required'
        ]);
        Entretient::create($request->all());
    return('alert');

    }
}
