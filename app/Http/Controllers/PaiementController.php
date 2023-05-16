<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Paiement;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    //enregistrer les information de paiement d'une reservation 
    public function store(Request $request,Reservation $reservation)
    {
        ##creationi de paiement object
        $paiement = new Paiement();
        $paiement->datePaiement = $request->datePaiement;
        $paiement->montant = $request->montant;
        //si le paiement était par chèque
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
        //Enregistrer 
        $paiement->save();
        // ajout de kilmetrage au voiture retourner 
        $voiture =Voiture::where('id',$reservation->idVoiture)->first();
        $reservation->distance = $request->kilometrage - $voiture->kilometrage ;
        $voiture->kilometrage =$request->kilometrage;
        $voiture->save();
        //ajout de paiemnet au reservatioin
        $reservation->idPaiement = $paiement->idPaiement;
        $reservation->save();
        //redirect to profile reservation
        return redirect('/dashboard/reservation');
    }
    /*
        mise ajour les données de paiemnet 
    */
    public function update(Request $request ,Paiement $paiement)
    {
        //get the reservation by id
        $reservation = Reservation::where('idReservation',$request->idReservation)->first();
        $paiement->update($request->all());
        //si un chèque a été  ajouter  
        if($request->Cheque && $paiement->idCheque == null ){
            $cheque = new Cheque();
            $cheque->montant=$request->montant;
            $cheque->dateCheque = $request->dateCheque;
            $cheque->idClient = $reservation->client->idClient;
            $cheque->save();
            $paiement->idCheque = $cheque->idCheque;
            }
            
            //si le chèque est modifié 
            elseif($request->Cheque && $paiement->idCheque != null ){
            $cheque = Cheque::where('idCheque',$paiement->idCheque)->first();
            $cheque->montant=$request->montant;
            $cheque->dateCheque = $request->dateCheque;
            $cheque->idClient = $reservation->client->idClient;
            $cheque->save();
            }
            $paiement->save();


            //redirect to reservation profile
        return redirect('/check/reservation/'.$request->idReservation);

    }
}
##end_paiement