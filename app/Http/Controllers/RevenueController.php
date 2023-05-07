<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Reservation;
use App\Models\TypeCharge;
use App\Models\Voiture;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Util\Json as PHPUnitUtilJson;
use Psy\Util\Json as UtilJson;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

class RevenueController extends Controller
{
    public function index(Request $request){
        $date1=$request->input('date1');
        $date2=$request->input('date2');
        $id=$request->input('voiture');
        if(!isset($date1,$date2)){
        $date1='2022/05/01' ;
        $date2 = date('y/m/d',time());
        }
        $revenue = RevenueController::revenue($date1, $date2,$id);
        $chargeVoiture = RevenueController::chargeVoiture($date1, $date2,$id);
        $chargeEntreprise =RevenueController::chargeEntreprise($date1, $date2) ;
        //dd($request,$revenue,$chargeEntreprise,$chargeVoiture,IsEmpty($id));
    
        $voitures = Voiture::all();
        $revenuePerCar = [];
        foreach($voitures as $v){ 
            if(is_numeric($id)){
            $v = Voiture::where('id',$id);}
            $revenuePerCar [] = ["voiture"=>strval($v->marque->marque[0].' '.$v->model->model),"montant"=>doubleval(RevenueController::revenue($date1,$date2,$v->id)->pluck('montant')->sum())];
            $ChargePerCar [] = ["voiture"=>$v->marque->marque.' '.$v->model->model,"montant"=>doubleval(RevenueController::chargeVoiture($date1,$date2,$v->id)->pluck('montant')->sum())];
            
        }
        $ChargePerType = [];
        foreach($chargeEntreprise as $t){
            if(isset( $ChargePerType[$t->chargeEntreprise->typeCharge->idTypeCharge] ))
            $ChargePerType[$t->chargeEntreprise->typeCharge->idTypeCharge] += $t->montant;
            else
            $ChargePerType[$t->chargeEntreprise->typeCharge->idTypeCharge] = $t->montant;
        }

        foreach($ChargePerType as $key=>$value){
            $nom =TypeCharge::where('idTypeCharge',$key)->first()->nomCharge;
            $ChargeEntPerType [] = ['label' =>$nom,'data'=>$value];
        }
        $stats =["revenue"=>$revenuePerCar,"charge"=>$ChargePerCar,'entreprise'=>$ChargeEntPerType];
        //dd($revenue->pluck('montant')->sum());
        return view('Pages.dashboard.revenue',['revenue' => $revenue,'voitures'=>$voitures,'chargeVoiture'=>$chargeVoiture,'chargeEntreprise'=>$chargeEntreprise,'stats'=>$stats]);
    }
    public static function revenue($date1,$date2,$idv)
    {
        return Reservation::all()->filter(function ($item) use ($date1, $date2,$idv) {
                $itemDate = $item->dateDebut;
                return ($itemDate >= $date1 && $itemDate <= $date2)&&($item->idVoiture==$idv || !isset($idv));
            });
    }
    public static function chargeVoiture($date1,$date2,$idv)
    {
        return Charge::all()->filter(function ($item) use ($date1, $date2,$idv) {
                $itemDate = $item->dateCharge;
                
                return ($itemDate >= $date1 && $itemDate <= $date2)&&(isset($item->idChargeVoiture))&&($item->ChargeVoiture->idVoiture==$idv || !isset($idv));
            });
    }
    public static function chargeEntreprise($date1,$date2)
    {
        return Charge::all()->filter(function ($item) use ($date1, $date2) {
                $itemDate = $item->dateCharge;
                return($itemDate >= $date1 && $itemDate <= $date2)&&(isset($item->chargeEntreprise->idChargeEntreprise));
            
            });
    }
    
   
}

