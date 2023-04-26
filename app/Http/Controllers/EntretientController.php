<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Entretient;
use App\Models\Piece;
use App\Models\PieceChangee;
use App\Models\Voiture;
use Illuminate\Http\Request;

class EntretientController extends Controller
{
    public function index(){

        $cars = Voiture::all();
        return view('Pages.dashboard.entretient',['entretient'=>true,'voitures'=>$cars]);
    }
    //remplir et afficher le form
    public function fill(Voiture $voiture){
        $pieces = Piece::all();
        
        return view('Pages.dashboard.add-entretien',['car'=>$voiture,'pieces'=>$pieces,'entretients'=>Entretient::where('idVoiture',$voiture->id)]);
    }
    public function store(Request $request,$id)
    {
        $request->validate([
            'date'=> 'required',
        ]);

        $entretient = Entretient::create($request->all());
        $chargev = new ChargeVoiture(["idVoiture"=>$id,'natureEntretient'=>$request->nature,'idEntretient'=>$entretient->idEntretient]);
        $chargev->save();
        $charge = new Charge(['categorieCharge'=>'Entretient','dateCharge'=>$request->date,'montant'=>$entretient->montant,'idChargeEntreprise'=>null,'idChargeVoiture'=>$chargev->idChargeVoiture]);
        $charge->save();
        foreach($request->idPiece as $idpiece){
            $piece= new PieceChangee(['idPiece'=> $idpiece,'idEntretient'=>$entretient->idEntretient]);
            $piece->save();
        }
        dd($piece);
    return('alert');

    }
}
