<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Entretient;
use App\Models\Piece;
use App\Models\PieceChangee;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntretientController extends Controller
{
    public function index(){

        $cars = Voiture::all();
        return view('Pages.dashboard.entretient',['entretient'=>true,'voitures'=>$cars]);
    }
    //remplir et afficher le form
    public function fill(Voiture $voiture){

        $pieces = Piece::all();
        //les pieces a changées selon les condition 
        $piecePerEnt = [];
        $entretiens = ChargeVoiture::where('idVoiture',$voiture->id)->orderBy('idEntretient', 'desc')->get();
        foreach($entretiens as $ent){
            if($ent->idEntretient !=null){
                $conditions = DB::select('SELECT (v.kilometrage - e.kilometrage) as kilo, DATEDIFF(CURRENT_DATE, e.date) as date
                FROM entretient e
                JOIN chargeVoiture cv ON cv.idEntretient = e.idEntretient
                JOIN voiture v ON v.id = cv.idVoiture
                WHERE e.idEntretient =?  and v.id = ?', [$ent->idEntretient,$voiture->id])[0];
                $pc = PieceChangee::where('idEntretient',$ent->idEntretient)->get();
                foreach($pc as $p){

                    if(!isset($piecePerEnt[$p->idPiece])){
                    
                        $piece=$pieces->where('idPiece',$p->idPiece)->first();
                        if(($piece->maxKilo <$conditions->kilo  &&$piece->maxKilo!=null)||$piece->maxDurre < $conditions->date &&$piece->maxDurre!=null)
                            $piecePerEnt[$p->idPiece]="red";
                            
                            else
                            //croissement des pnueus
                            if($conditions->kilo>15000 && $piece->maxKilo!=null && $p->idPiece==10){
                                $piecePerEnt[$p->idPiece]="warning";
                            }else
                            
                            $piecePerEnt[$p->idPiece]="green";
                    }
                }
            }
        }        

        return view('Pages.dashboard.add-entretien',['car'=>$voiture,'pieces'=>$pieces,'stat'=>$piecePerEnt]);
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
