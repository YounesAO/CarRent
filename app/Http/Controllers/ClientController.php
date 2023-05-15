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
    public function index()
    {
        
       return view('Pages.client.index');
    }

    public function add()
    {
        return view('Pages.client.new');
    }

    public function insert(Request $request)
    {
        $client =new Client($request->all());
        $permis = new Permis($request->all());
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
        $permis->save();
        $client->idPermis = $permis->idPermis;
        $client->save();
        return redirect('dashboard/Clients');
    }
    public function store(Request $request){
        // dd($request);
        $info=$request->req_;
        if($info['prix']==null)
        $info['prix']=$request->prix;
        $permis=new Permis(['datePermis'=>$request->datePermis,'villePermis'=>$request->villePermis,'photoPermis'=>$request->imagePermis]);
        $permis->save();
        $client = new Client($request->all());
        $client->CIN=$info['cin'];
        $client->idPermis = $permis->idPermis;
        $client->save();
        $reservation = new Reservation(['idClient'=>$client->idClient,'idVoiture'=>$info['idVoiture'],'dateDebut'=>$info['dateDebut'],'dateRetour'=>$info['dateRetour'],'prix'=>$info['prix']]);
        $reservation->save();
        return view("Pages.Reservation.about",['reservation'=>$reservation,'client'=>$client,'voiture'=>Voiture::where('id',$info['idVoiture'])]);
        } 



        public function view(Request $request)
        {   
            if((request('CIN')!=null))
            $client =Client::where('CIN',request('CIN'))->first();
            else
            $client = Client::where('idClient',request('client'))->first();
            $clientReservation= Reservation::where('idClient',$client->idClient)->get();
            $data = [];

            foreach($clientReservation as $r){
                $data[]=["date"=>$r->dateDebut,"montant"=>$r->montant,"duree"=> $r->duree];
            }
            $clientReservation->groupby('idVoiture')->count('idReservation');
            $pievoiture= [];
            foreach($clientReservation->groupby('idVoiture') as $voiture){
                $pievoiture[]=["voiture"=>$voiture->first()->voiture->nom ,"stats"=>$voiture->count()];
            }
            if($client ==null){
                return view('Pages.Client.index',['error'=>"aucun client associe à ce numéro CIN"]);
            }
            return view('Pages.Client.profile',['client'=>$client,"data"=>$data,"pieData"=>$pievoiture]);

        }



        public function show(Request $request)
        {
            $client = Client::where('idClient',$request->client)->first();
            return view('Pages.Client.profile',['client'=>$client]);
        }



        public function drop(Client $client)
        {
            $client->delete();
            return redirect('/dashboard/client');
        }



        public function all()
        {
            $clients = Client::all();
            return view('Pages.client.history',["clients"=>$clients]);
        }
    }

