<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function store(Request $request){
        // dd($request);
        $info=$request->req_;
        DB::insert('insert into permis (`idPermis`,`datePermis`,`villePermis`,`photoPermis`) values (?, ?, ?, ?)', [null,$request->datePermis,$request->villePermis,$request->imagePermis]);
        $idp =DB::select('select idPermis from Permis where datePermis = ? and villePermis = ?',[$request->datePermis,$request->villePermis]);
        DB::insert('insert into client (`idClient`, `nomClient`, `prenomClient`, `CIN`, `dateNaissance`,
        `adresseClient`, `nationalite`, `photoCIN`, `idPermis`, `created_at`, `updated_at`) values
        (?,?,?,?,?,?,?,?,?,?,?)',
        [null,$request->nom,$request->prenom,$info['cin'],$request->dateNaiss,
        $request->adresseClient,$request->nationalite,$request->image,$idp[0]->idPermis,null,null]);
        $idc = DB::select('select idClient from client where CIN = ? ',[$info['cin']]);
        DB::insert('insert into reservation (`idReservation`,`idClient`,`idVoiture`,`dateDebut`,`dateRetour`) values
        (?,?,?,?,?)',[null,$idc[0]->idClient,$info['idVoiture'],$info['dateDebut'],$info['dateRetour']]);
        
        $reservation = DB::select('select * from reservation order by(idReservation) desc LIMIT 1');
        return view("Pages.Reservation.check",['reservation'=>$reservation[0],'client'=>Client::where('idClient',$info['cin']),'voiture'=>Voiture::where('id',$info['idVoiture'])]);
        } 
    }

