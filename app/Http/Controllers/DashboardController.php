<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /*
    ### ce controller ne contient pas un model 
    §§§ c'est pour preparer les données a visualiser dans la page de dashboard 
    */

    public function index()
    {
        $reservations = Reservation::all();
        //selectionner les mellieure voiture reservée
        $topCars = DB::select(
            'SELECT idVoiture as voiture,
            count(idvoiture) as nbReservation 
            FROM `reservation` where `deleted_at` is null 
            and YEAR(dateDebut) =YEAR(CURRENT_DATE) 
            and month(dateDebut) = MONTH(CURRENT_DATE) 
            group by (idVoiture) 
            order by nbReservation desc limit 3');
        foreach($topCars as $car){
            $car->voiture = Voiture::where('id',$car->voiture)->first();
        }
        //les reservation de  ce mois encours
        $chart = DB::select('SELECT dateDebut AS date ,
            count(idReservation) as number 
            ,sum(`prix` * DATEDIFF( `dateRetour`, `dateDebut` ))as revenues
            FROM `reservation` WHERE YEAR(dateDebut) = YEAR(CURRENT_DATE) 
            and month(dateDebut) = MONTH(CURRENT_DATE) 
            and deleted_at is null 
            group by (dateDebut);');
            $stats = [];
        //le nombre de reservation par voiture
        foreach(Voiture::all() as $voiture){
            $stats[] =["voiture"=>$voiture->nom ,"nbReservation" => Reservation::where('idVoiture',$voiture->id)->whereMonth('dateDebut',date('m'))->whereYear('dateDebut',date('Y'))->count()];
        }
        //la duree de reservation la plus demandée
        $duree = DB::select('SELECT DATEDIFF(`dateRetour`,`dateDebut`) as duree,
        count(idReservation) as number 
        from reservation
        where (Year(dateDebut)=year(CURRENT_DATE)
        and month(dateDebut) = month(CURRENT_DATE))
        and `deleted_at`is null 
        group by (duree);');
        //retourner tous les variables
        return view('Pages.dashboard.home',['cars'=>Voiture::all(),'reservations'=>$reservations,'topCars'=>$topCars,'stats'=>$chart,'statsReservation'=>$stats,'duree'=>$duree]);

    }
}
