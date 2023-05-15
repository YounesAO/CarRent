<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Permis;
use App\Models\Reservation;
use App\Models\Voiture;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

use function Ramsey\Uuid\v1;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::where('idPaiement',null)->get();
        return (view('Pages.Reservation.reservation',['reservations'=>$reservations ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function send(Request $request ,$id)
    {
        $request->merge(['idVoiture' => $id]);
        return $this->prepare($request,$id);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function prepare(Request $request,$id)
    {

    $request->validate([
        'cin'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        'dateDebut' => 'required|date|after_or_equal:today',
        'dateRetour' => 'required|date|after:dateDebut',
    ],[
        'cin.regex'=>"le numéro de cin doit etre de la forme AB12345",
        'cin.required'=>'le numéro de CIN est oblogatoire',
        'dateDebut.required'=>'la date de debut est obligatoire',
        'dateDebut.date'=>'le champ doit etre de la format  d\'une date',
        'dateDebut.after_or_equal'=>'la date de debut doit etre égale au supérieure à la date aujourd\'huit',
        'dateRetour.required'=>'la date de debut est obligatoire',
        'dateRetour.after'=>'la date de retour est date doit etre inférieure à la date de debut',
        'prix.numeric'=>"le prix doit etre numerique",
        'prix.required'=>"le prix est obligatoire",

    ]);
    $condition = Reservation::all()->filter(function ($item) use($request,$id){
        $depart = $item->dateDebut;
        $retour = $item->dateRetour;
        return (   $retour> $request->dateDebut and $depart<$request->dateRetour and $item->idVoiture==$id
            );
        });
        if(!$condition->isEmpty()){
            return(Redirect::back()->withErrors(['la voiture selectionnée et occupée durant cette periode']));
        }

        $client= Client::where('CIN', $request->cin)->first();

        if($client == null)
            return view('Pages.Client.add',['req'=>$request,'id'=>$id]);
        else
            $permis= Permis::where('idPermis', $client->idPermis)->first();

        return view('Pages.Client.check',['req'=>$request,'id'=>$id,'client'=>$client,'permis'=>$permis]);
    
    }
    public function store(Request $request){
        $info =$request->req_;
        if($info['prix']==null)
        $info['prix']=$request->prix;
        $client=Client::where('CIN',$info['cin'])->first();
        $permis=Permis::where('idPermis',$client->idPermis)->first();
        $permis->update(['datePermis'=>$request->datePermis,'villePermis'=>$request->villePermis,'photoPermis'=>$request->imagePermis]);
        $client->update($request->all());
        $client->CIN=$info['cin'];
        $client->idPermis = $permis->idPermis;
        $client->save();
        $reservation = new Reservation(['idClient'=>$client->idClient,'idVoiture'=>$info['idVoiture'],'dateDebut'=>$info['dateDebut'],'dateRetour'=>$info['dateRetour'],'prix'=>$info['prix']]);
        $reservation->save();
        return view("Pages.Reservation.about",['reservation'=>$reservation,'client'=>Client::where('idClient',$request->idClient),'voiture'=>Voiture::where('id',$info['idVoiture'])->first()]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::where('idReservation',$id)->first();
        return(view("Pages.Reservation.about",[
            'reservation'=>$reservation,
            'client'=>$reservation->client,
            'voiture'=>$reservation->voiture
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function filter(Request $request )
    {
        $date1 = $request->input('dateDebut');
        $date2 = $request->input('dateRetour');
        $voitures = Voiture::whereRaw('id not IN( SELECT idVoiture from reservation where dateRetour >? and dateDebut<? )',[$date1,$date2])->get();

        return (view('Pages.Reservation.selectCar',['voitures'=>$voitures,'req'=>$request]));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect('dashboard/reservation');  
}
    public function view(Request $request)
    {   
        $date = $request->input('month');
        if($date == null){
            $date = new DateTimeImmutable();
            $date = $date->format('Y-m-d H:i:s');
        }
        $date = explode('-', $date);
        $reservations =Reservation::whereYear('dateDebut','=',$date[0])->whereMonth('datedebut', '=', $date[1])->get();
        return view('Pages.Reservation.reservation-history',['reservations'=>$reservations,'month'=>$date]);
    }

    public function slide()
    
    {     
        $today = date('Y-m-d', time());
        $reservations = Reservation::all()->filter(function ($item) use($today){
            $depart = $item->dateDebut;
            $retour = $item->dateRetour;
            return (  $depart<= $today &&$retour >= $today);
        }); 

        return view('components.reservation.slider',['reservations'=>$reservations]);
    }
    public function slideUpaid()
    
    {     
        $today = date('Y-m-d', time());
        $reservations = Reservation::all()->filter(function ($item) use($today){
            $depart = $item->dateDebut;
            $retour = $item->dateRetour;
            return (  $depart < $today &&$retour <= $today && $item->idPaiement ==null);
        }); 

        return view('components.reservation.slider',['reservations'=>$reservations]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('dashboard/reservation/history')->with('status',"la reservation a été bien suprimmée");
    }
    function restore ($id){
        Reservation::withTrashed()
            ->where('idReservation', $id)
            ->restore();
            
        return Redirect('settings/deleted')->with('status',"la reservation a été bien restaurée");
    }
}
