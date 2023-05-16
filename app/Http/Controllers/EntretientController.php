<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Entretient;
use App\Models\Piece;
use App\Models\PieceChangee;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class EntretientController extends Controller
{
    public function index(){
        $cars = Voiture::all();
        return view('Pages.dashboard.entretient',['entretient'=>true,'voitures'=>$cars]);
    }
    //remplir et afficher le form
    
    public function fill(Voiture $voiture){
        $pieces = Piece::all();
        $piecePerEnt = EntretientController::entretiens($voiture);
        if(request('form')!=null)
        return view('Pages.dashboard.add-entretien',['form'=>true,'car'=>$voiture,'pieces'=>$pieces,'stat'=>$piecePerEnt]);
        //liste des entretients
        $entretients = Entretient::whereIn('idEntretient',ChargeVoiture::where('idVoiture',$voiture->id)->get('idEntretient')->toArray())->get();
        return view('Pages.dashboard.add-entretien',['car'=>$voiture,'pieces'=>$pieces,'stat'=>$piecePerEnt,'entretients'=>$entretients]);

    }
    /*
        mise ajour les données de client 
    */
    public function store(Request $request,$id)
    {
        $request->validate([
            'date'=> 'required',
        ]);

        $entretient = Entretient::create($request->all());
        $chargev = new ChargeVoiture(["idVoiture"=>$id,'natureCharge'=>"Entretient",'idEntretient'=>$entretient->idEntretient]);
        $chargev->save();
        $charge = new Charge(['categorieCharge'=>'voiture','dateCharge'=>$request->date,'montant'=>$entretient->montant,'idChargeEntreprise'=>null,'idChargeVoiture'=>$chargev->idChargeVoiture]);
        $charge->save();
        //les pieces changeés 
        foreach($request->idPiece as $idpiece){
            $piece= new PieceChangee(['idPiece'=> $idpiece,'idEntretient'=>$entretient->idEntretient]);
            $piece->save();
        }
        return back()->with("status","l'entretient a été enregistré par succèss");
    }
    public static function entretiens(Voiture $voiture)
    {
        $pieces = Piece::all();
        //les pieces a changées selon les condition 
        $piecePerEnt = [];
        $pieces = Piece::all();
        foreach($pieces as $piece){
            // ChargeVoiture entretiens picharge pices 
            $entretien = Entretient::whereIn('idEntretient',PieceChangee::where('idPiece',$piece->idPiece)->pluck('idEntretient'))->get()->filter(function ($item) use ($voiture) {
                
                return(ChargeVoiture::where('idEntretient',$item->idEntretient)->first()->idVoiture == $voiture->id);
            })->last();;
            if($entretien !=null){
                    $conditions = DB::select('SELECT (v.kilometrage - e.kilometrage) as kilo, DATEDIFF(CURRENT_DATE, e.date) as date
                    FROM entretient e
                    JOIN chargeVoiture cv ON cv.idEntretient = e.idEntretient
                    JOIN voiture v ON v.id = cv.idVoiture
                    WHERE e.idEntretient =?  and v.id = ?',[$entretien->idEntretient,$voiture->id]);
                    if($conditions!=null)
                    $conditions = $conditions[0];
                    if(($piece->maxKilo <$conditions->kilo  && $piece->maxKilo!=null)||($piece->maxDurre < $conditions->date &&$piece->maxDurre!=null))
                    $piecePerEnt[$piece->idPiece]="red";
                    else
                    //croissement des pnueus
                    if($conditions->kilo>15000 && $piece->maxKilo!=null && $piece->idPiece==10){
                        $piecePerEnt[$piece->idPiece]="warning";
                    }else{
                        $piecePerEnt[$piece->idPiece]="green";
                    }
                }else{
                    if(($piece->maxKilo <$voiture->kilometrage  && $piece->maxKilo!=null)||($piece->maxDurre < $voiture->dateDachat &&$piece->maxDurre!=null))
                    $piecePerEnt[$piece->idPiece]="red";
                    else
                    $piecePerEnt[$piece->idPiece]="never";
            }

            }

        // $entretiens = ChargeVoiture::where('idVoiture',$voiture->id)->orderBy('idEntretient', 'desc')->get();       
        // if($entretiens->isEmpty()){
        //     foreach(Piece::all() as $p)
        //     {()
        //         $piecePerEnt[$p->idPiece]="warning";

        //     }
        //     return $piecePerEnt;

        //         $conditions = DB::select('SELECT (v.kilometrage - e.kilometrage) as kilo, DATEDIFF(CURRENT_DATE, e.date) as date
        //         FROM entretient e
        //         JOIN chargeVoiture cv ON cv.idEntretient = e.idEntretient
        //         JOIN voiture v ON v.id = cv.idVoiture
        //         WHERE e.idEntretient =?  and v.id = ?', [$entretiens[$i],$voiture->id])->get();
                        
        //         }
        //     }
        // } 
        return $piecePerEnt ;
    }
}
