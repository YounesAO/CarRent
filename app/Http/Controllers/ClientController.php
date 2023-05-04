<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Permis;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function store(Request $request){
        // dd($request);
        $info=$request->req_;
        $permis=new Permis(['datePermis'=>$request->datePermis,'villePermis'=>$request->villePermis,'photoPermis'=>$request->imagePermis]);
        $client = new Client($request->all());
        $client->CIN=$info['cin'];
        $client->idPermis = $permis->idPermis;
        $reservation = new Reservation(['idClient'=>$client->idClient,'idVoiture'=>$info['idVoiture'],'dateDebut'=>$info['dateDebut'],'dateRetour'=>$info['dateRetour']]);
        return view("Pages.Reservation.about",['reservation'=>$reservation,'client'=>$client,'voiture'=>Voiture::where('id',$info['idVoiture'])]);
        } 
    }

