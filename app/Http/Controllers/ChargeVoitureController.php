<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ChargeVoitureController extends Controller
{
    public function index()
    {
        $cars = Voiture::all();
        return (view('Pages.Charge.charge-voiture',['cars'=>$cars,'charge'=>true]));
    }
    public function view(Voiture $voiture){
        return (view('Pages.Charge.charge-form',['car'=>$voiture]));
    }
    public function store(Request $request,$voiture)
    {   
        $chargeVoiture = new ChargeVoiture(['idVoiture'=>$voiture,'natureCharge'=>$request->nature]);
        $chargeVoiture->save();
        $charge = new Charge(['categorieCharge'=>"Voiture",'dateCharge'=>$request->dateCharge,'montant'=>$request->montant,'idChargeVoiture'=>$chargeVoiture->idChargeVoiture ]);
        $charge->save();
        return redirect('dashboard');
    }
}
