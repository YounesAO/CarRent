<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeEntreprise;
use App\Models\TypeCharge;
use Illuminate\Http\Request;

class ChargeEntrepriseController extends Controller
{
    #show the vew of the form whith all types of charges
    public function index()
    {
        return(view('Pages.Charge.charge-entreprise',['types'=>TypeCharge::all()]));
    }
    #store the charge Entreprise
    public function store(Request $request)
    {  
        $chargeEntreprise = new ChargeEntreprise(['idTypeCharge'=>$request->nature]);
        $chargeEntreprise->save();
        $charge = new Charge(['categorieCharge'=>"Entreprise",'dateCharge'=>$request->dateCharge,'montant'=>$request->montant,'idChargeEntreprise'=>($chargeEntreprise->idChargeEntreprise)]);
        $charge->save();
        return redirect('/dashboard/analyse');
    }
}
