<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ChargeVoitureController extends Controller
{
    //returner toutes les charge des voitures
    public function index()
    {
        $cars = Voiture::all();
        return (view('Pages.Charge.charge-voiture',['cars'=>$cars,'charge'=>true]));
    }
    /*
        afficher les données de la charge
    */
    public function view(Voiture $voiture){
        return (view('Pages.Charge.charge-form',['car'=>$voiture]));
    }
    /*
        enregister les données de la charge voitures
    */
    public function store(Request $request,$voiture)
    {   
        $chargeVoiture = new ChargeVoiture(['idVoiture'=>$voiture,'natureCharge'=>$request->nature]);
        $chargeVoiture->save();
        $charge = new Charge(['categorieCharge'=>"Voiture",'dateCharge'=>$request->dateCharge,'montant'=>$request->montant,'idChargeVoiture'=>$chargeVoiture->idChargeVoiture ]);
        $charge->save();
        return redirect('dashboard');
    }
}

##end_chargeVoiture