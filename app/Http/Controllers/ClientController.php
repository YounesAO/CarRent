<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Permis;
use App\Models\Reservation;
use App\Models\Voiture;
use App\Observers\ClientObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\RequestContext;

class ClientController extends Controller
{
    public function index()
    {
        
       return view('Pages.client.index');
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
            $client =Client::where('CIN',request('CIN'))->first();
            if($client ==null){
                return view('Pages.Client.index',['error'=>"aucun client associe à ce numéro CIN"]);
            }
            return view('Pages.Client.profile',['client'=>$client]);

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
    }

