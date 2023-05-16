<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Permis;
use App\Models\Reservation;
use App\Models\Voiture;
use App\Observers\ClientObserver;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\RequestContext;

class ClientController extends Controller
{
    //retourner un formulaire de recherche de client par [cin] Carte D'identité nationale 
    public function index()
    {
        return view('Pages.client.index');
    }
    /*
        afficher le formulaire d'ajout d'un nouveau client 
    */
    public function add()
    {
        return view('Pages.client.new');
    }

    /*
        l'insertion des onformation d'un nouveau client 
    */
    public function insert(Request $request)
    {   
        ##creation de client et son permis
        $client =new Client($request->all());
        $permis = new Permis($request->all());
        ##traitement des photo s'elles existent
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
        //enregistrer les données
        $permis->save();
        $client->idPermis = $permis->idPermis;
        $client->save();
        //redirection vers la liste des clients
        return redirect('dashboard/Clients');
    }
    /*
        enregistrer les information  de reservation d'un nouveau client sur la base de données 
    */
    public function store(Request $request)
    {
    //information sir la periode de la reservation 
        $info=$request->req_;
        //si le prix est null
        if($info['prix']==null)
        $info['prix']=$request->prix;
        //creation de permis
        $permis=new Permis(['datePermis'=>$request->datePermis,'villePermis'=>$request->villePermis,'photoPermis'=>$request->imagePermis]);
        $permis->save();
        //creation ce client
        $client = new Client($request->all());
        $client->CIN=$info['cin'];
        $client->idPermis = $permis->idPermis;
        $client->save();
        //creation de reservation
        $reservation = new Reservation(['idClient'=>$client->idClient,'idVoiture'=>$info['idVoiture'],'dateDebut'=>$info['dateDebut'],'dateRetour'=>$info['dateRetour'],'prix'=>$info['prix']]);
        $reservation->save();

        ##traitement des photo s'elles exitent
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
        //enregistrer les modifications sur db
        $permis->save();
        $client->save();
        return view("Pages.Reservation.about",['reservation'=>$reservation,'client'=>$client,'voiture'=>Voiture::where('id',$info['idVoiture'])]);
    } 
    /*     
        afficher des information de client  
    */
    public function view(Request $request)
    {   
        //recuperation de client par son cin
        if((request('CIN')!=null))
            $client =Client::where('CIN',request('CIN'))->first();
        else
        //recuperation de client par son identifiant
            $client = Client::where('idClient',request('client'))->first();
        ##-->si le client n'existe pas
        if($client ==null){
                return view('Pages.Client.index',['error'=>"aucun client associe à ce numéro CIN"]);
        }

        //preparation des données de chart reservertion de client 
        $clientReservation= Reservation::where('idClient',$client->idClient)->get();
        $data = [];
            foreach($clientReservation as $r){
                $data[]=["date"=>$r->dateDebut,"montant"=>$r->montant,"duree"=> $r->duree];
            }
        //data de nombre reservations par voiture
        $clientReservation->groupby('idVoiture')->count('idReservation');
        $pievoiture= [];
            foreach($clientReservation->groupby('idVoiture') as $voiture){
                $pievoiture[]=["voiture"=>$voiture->first()->voiture->nom ,"stats"=>$voiture->count()];
            }
        //retunr view data client
            return view('Pages.Client.profile',['client'=>$client,"data"=>$data,"pieData"=>$pievoiture]);
        }

    /*
        afficher de profile client de client  
    */
        
    public function show(Request $request)
    {
        $client = Client::where('idClient',$request->client)->first();
        return view('Pages.Client.profile',['client'=>$client]);    
    }


/*
    afficher le formulaire de mofidication des info client 
*/
    public function edit(Client $client)
    {
        return view('Pages.client.editeForm',['client'=>$client]);
    }
    /*
        mise ajour les données de client 
    */
    public function update(Request $request ,Client $client)
    {
        $client->update($request->except('photoCIN'));
        $permis = $client->permis;
        $permis->update($request->except('photoPermis'));
        //mise a jour de sphoto s'elles existent
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
        //enregister les données 
        $permis->save();
        $client->save();
        //redireger avec un message de succèss
        return redirect('/profile/client?client='.$client->idClient)->with('stats','les information du Client ont été modifié avec succès');
    }    

    /*
        retourner la liste des clients 
    */
    public function all()
    {
        $clients = Client::all();
        return view('Pages.client.history',["clients"=>$clients]);
    }
    /*
        suprimmer un client  par son identifiant
    */
    public function drop(Client $client)
    {   
        $client->delete();
        return redirect('/dashboard/client')->with("stats","le client a été suprimer par succès");
    }
    /*
        Resaturer un client par son identiifiant 
    */
    function restore( $id){
        Client::withTrashed()->where('idClient',$id)->restore();
        return Redirect('settings/deleted')->with('status',"Le client a été bien restauré");
    }
    }

##endClient