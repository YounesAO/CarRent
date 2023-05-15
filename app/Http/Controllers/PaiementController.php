<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Paiement;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function store(Request $request,Reservation $reservation)
    {
        $paiement = new Paiement();

        $paiement->datePaiement = $request->datePaiement;
        $paiement->montant = $request->montant;

        if($request->Cheque){
        $cheque = new Cheque();
        $cheque->montant=$request->montant;
        $cheque->dateCheque = $request->dateCheque;
        $cheque->idClient = $reservation->client->idClient;
        $cheque->save();
        $paiement->idCheque = $cheque->idCheque;
        }else{
            $paiement->idCheque=null;
        }

        $paiement->save();
        $voiture =Voiture::where('id',$reservation->idVoiture)->first();
        $reservation->distance = $request->kilometrage - $voiture->kilometrage ;
        $voiture->kilometrage =$request->kilometrage;
        $voiture->save();
        
        $reservation->idPaiement = $paiement->idPaiement;
        $reservation->save();

        return redirect('/dashboard/reservation');
    }
    public function update(Request $request ,Paiement $paiement){
        
        $reservation = Reservation::where('idReservation',$request->idReservation)->first();
        $paiement->update($request->all());
        if($request->Cheque && $paiement->idCheque == null ){
            $cheque = new Cheque();
            $cheque->montant=$request->montant;
            $cheque->dateCheque = $request->dateCheque;
            $cheque->idClient = $reservation->client->idClient;
            $cheque->save();
            $paiement->idCheque = $cheque->idCheque;
            }elseif($request->Cheque && $paiement->idCheque != null ){
            $cheque = Cheque::where('idCheque',$paiement->idCheque)->first();
            $cheque->montant=$request->montant;
            $cheque->dateCheque = $request->dateCheque;
            $cheque->idClient = $reservation->client->idClient;
            $cheque->save();

            }
            $paiement->save();



        return redirect('/check/reservation/'.$request->idReservation);

    }
}
