<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Permis;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function prepare(Request $request,$id)
    {
    $request->validate([
        'cin'=>'required|regex:/(^([a-zA-z]+)(\d+)?$)/u',
        'dateDebut' => 'required|date|after:today',
        'dateRetour' => 'required|date|after:dateDebut'
    ]);
        $client= Client::where('CIN', $request->cin)->first();

        if($client == null)
            return view('Pages.Client.add',['req'=>$request,'id'=>$id]);
        else
            $permis= Permis::where('idPermis', $client->idPermis)->first();

        return view('Pages.Client.check',['req'=>$request,'id'=>$id,'client'=>$client,'permis'=>$permis]);

    
    }
    public function store(Request $request){
        $info =$request->req_;
        DB::insert('insert into reservation (`idReservation`,`idClient`,`idVoiture`,`dateDebut`,`dateRetour`) values
        (?,?,?,?,?)',[null,$request->idClient,$info['idVoiture'],$info['dateDebut'],$info['dateRetour']]);
        
        $reservation = DB::select('select * from reservation order by(idReservation) desc LIMIT 1');

        return view("Pages.Reservation.check",['reservation'=>$reservation[0],'client'=>Client::where('idClient',$request->idClient),'voiture'=>Voiture::where('idVoiture',$info['idVoiture'])]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
