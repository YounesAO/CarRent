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
     * afficher liste des reservations
     */
    public function index()
    {
        $reservations = Reservation::where('idPaiement',null)->get();
        return (view('Pages.Reservation.reservation',['reservations'=>$reservations ]));
    }

    /**
     * ajouter la voiture a la reservation encours
     */
    public function send(Request $request ,$id)
    {
        $request->merge(['idVoiture' => $id]);
        return $this->prepare($request,$id);        
    }

    /**
     * preparer la reservation encours
     */
    public function prepare(Request $request,$id)
    {
        //validation des champs de form reservation 
    $request->validate([
        'cin'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        'dateDebut' => 'required|date|after_or_equal:today',
        'dateRetour' => 'required|date|after:dateDebut',
    ],
    //messages des erreurs de saisie
    [
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
    //condition des voitures occupées durant la periode entrée
    $condition = Reservation::all()->filter(function ($item) use($request,$id){
        $depart = $item->dateDebut;
        $retour = $item->dateRetour;
        return (   $retour> $request->dateDebut and $depart<$request->dateRetour and $item->idVoiture==$id
            );
        });
        //si la condition est vrai l'utilisateur sera rediregé vers le form pour mofidiée les date.
        if(!$condition->isEmpty()){
            return(Redirect::back()->withErrors(['la voiture selectionnée et occupée durant cette periode']));
        }
        //sinon la preparation se continuera
        $client= Client::where('CIN', $request->cin)->first();
        #si le client existe ou non ,un formulaire pour ajouter un client s'affichera
        if($client == null)
            return view('Pages.Client.add',['req'=>$request,'id'=>$id]);
        else
        //le client deja existe
            $permis= Permis::where('idPermis', $client->idPermis)->first();
        //redirection pour verifier les informations de client 
        return view('Pages.Client.check',['req'=>$request,'id'=>$id,'client'=>$client,'permis'=>$permis]);
    
    }
    /*
        enregistrer la reservation  
    */
    public function store(Request $request)
    {
        //information sur la periode de reservation req => ## premiere request ##
        $info =$request->req_;
        //si le prix est null 
        if($info['prix']==null)
        $info['prix']=$request->prix;
        ##mise ajour des information de client et son permis 
        $client=Client::where('CIN',$info['cin'])->first();
        $permis=Permis::where('idPermis',$client->idPermis)->first();
        $permis->update(['datePermis'=>$request->datePermis,'villePermis'=>$request->villePermis,'photoPermis'=>$request->imagePermis]);
        $client->update($request->all());
        $client->CIN=$info['cin'];
        $client->idPermis = $permis->idPermis;
        $client->save();

        ##la création d'objet Reservation
        $reservation = new Reservation(['idClient'=>$client->idClient,'idVoiture'=>$info['idVoiture'],'dateDebut'=>$info['dateDebut'],'dateRetour'=>$info['dateRetour'],'prix'=>$info['prix']]);
        $reservation->save();
        //traitement des images s'elles existent
        if($request->hasFile('photoCIN')){
            $fileName = 'Client/id'.$client->CIN.'/_'.time() .'.' . $request->photoCIN->extension();
            $path = $request->file('photoCIN')->move(public_path('/images/Client/id'.$client->CIN.'/'),$fileName);
            $client->photoCIN = $fileName;
        }
        if($request->hasFile('photoPermis')){
            $fileName = 'Client/id'.$client->CIN.'/Permis'.time() .'.' . $request->photoPermis->extension();
            $path = $request->file('photoPermis')->move(public_path('/images/Client/id'.$client->CIN.'/'),$fileName);
            $permis->photoPermis = $fileName;
        }
        //enregester les modification sur la base de données
        $permis->save();
        $client->save();
        //redirection
        return view("Pages.Reservation.about",['reservation'=>$reservation,'client'=>Client::where('idClient',$request->idClient),'voiture'=>Voiture::where('id',$info['idVoiture'])->first()]);
    }

    /**
     * Affichage des informations d'une réservation par son identifiant
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
     * Filter les réservations par la date de debut et retour  
     * retourner les voitures libre dans cette periode
     */
    public function filter(Request $request )
    {
        $date1 = $request->input('dateDebut');
        $date2 = $request->input('dateRetour');
        $voitures = Voiture::whereRaw('id not IN( SELECT idVoiture from reservation where dateRetour >? and dateDebut<? )',[$date1,$date2])->get();
        return (view('Pages.Reservation.selectCar',['voitures'=>$voitures,'req'=>$request]));

    }

    /**
     * mise a jour des information de la reservation donnée.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect('dashboard/reservation');  
    }
    /*
        afficher les reservations par date //mois//annes choisié 
    */
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

     /*
        preparer les données de slide des reservation encours 
    */
    public function slide()
    
    {     
        $today = date('Y-m-d', time());
        //selection toutes les reservations encours
        $reservations = Reservation::all()->filter(function ($item) use($today){
            $depart = $item->dateDebut;
            $retour = $item->dateRetour;
            return (  $depart<= $today &&$retour >= $today);
        }); 
        return view('components.reservation.slider',['reservations'=>$reservations]);
    }
     /*
        preparer les données de slide des reservation terminer et qui on pas du  paiements  
    */
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
     * supremer la reservation par son identifiant
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('dashboard/reservation/history')->with('status',"la reservation a été bien suprimmée");
    }
     /*
        restaurer une reservation par son identifiant 
    */
    function restore ($id){
        Reservation::withTrashed()
            ->where('idReservation', $id)
            ->restore();
        return Redirect('settings/deleted')->with('status',"la reservation a été bien restaurée");
    }
}
//end_reservation