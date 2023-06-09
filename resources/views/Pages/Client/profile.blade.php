@php $title = "profile de Client" @endphp
@extends('dashboard')
@section('content')
<div class="client">
    @if(session('stats'))
        <div class="alert m-3   alert-success">
            {{session('stats')}}
        </div>
    @endif
    <section class="header m-2 p-3">
        <div class="icon">
            <i class="fa-solid fa-user"></i>
            <span>Information du client</span>
        </div>
    <div  class="h-info d-flex align-items-center flex-wrap justify-content-start m-1 p-2">
       
        <div class="stats bg-4 col-11  col-md-4 col-lg-3 p-2 mb-2">
            <span >Nom :</span>
            <span class="montant">{{$client->nomClient}}</span>

        </div>
        <div class="stats bg-4 col-11  col-md-4 col-lg-3 p-2 mb-2"> 
            <span>Prenom :</span>
            <span class="montant">{{$client->prenomClient}}</span>

        </div>

        <div class="stats bg-4 col-11 col-md-3 col-lg-2 p-2 mb-2"> 
            <span> Totale reservation :</span>
            <span class="montant">{{count($data)}}</span>
        </div>

        <div class="stats bg-4 col-11 col-md-4 col-lg-3 p-2 mb-2"> 
            <span> Totale revenues :</span>
            <span class="montant">{{array_sum(array_column($data, 'montant'))}} dh</span>
        </div>
        
        
    </div>
</section>

<section class="m-2 ">
    <div class="style1 d-flex justify-content-between align-items-center  bg-3">
        <h5 class=" p-3 mb-0">
            Information sur le client
        </h5>
        <div class=" p-3 ">
            <a class="btn btn-success m-1"href="/new/reservation?client={{$client->idClient}}">Ajouter Réservation</a>
            <a class="btn btn-primary" href="/edite/client/{{$client->idClient}}">Modifier</a>
            <a class="btn btn-danger" href="/delete/client/{{$client->idClient}}">Suprimmer</a>
        </div>
    </div>
    
    <div class="d-flex  m-2">
            <div class="d-flex col-3 flex-column m-1">
                <span>Date naissance : <span class="bold">{{$client->dateNaissance}}</span></span>
                <span>Nationalite : <span class="bold">{{$client->nationalite}}</span></span>
                <span>Adresse : <span class="bold">{{$client->adresseClient}}</span></span>
                <span>CIN : <span class="bold">{{$client->CIN}}</span></span>
                <span>Carte d'identité : 
                    @if($client->photoCIN!=null)
                    <span class="bold"><a href="{{ asset("images/$client->photoCIN") }}">Voir</a></span></span>
                    @else
                    <span>aucune photo</span>
                    @endif
                </div>
            <div class="d-flex col-5 flex-column m-1">
                <span>Ville d'obtention de permis :<span class="bold">{{$client->permis->villePermis}}</span></span>
                <span>Date de permis : <span class="bold">{{$client->permis->datePermis}}</span></span>
                <span>numéro de permis : <span class="bold">{{$client->permis->numPermis}}</span></span>

                <span>Photo de permis  : 
                    @if($client->permis->photoPermis!=null)
                    <span class="bold"><a href="{{ asset("images")}}/{{$client->permis->photoPermis}}">Voir</a></span></span>
                    @else
                    <span>aucune photo</span>
                    @endif
                </div>
    </div>
</section>
<h5 class=" m-2 style1 p-3 bg-3">
    Historique du client
</h5>
<section class="d-flex col-12 flex-wrap">
    <div class="box d-flex flex-column justify-content-between col-11 col-lg-6 m-3">
        <canvas id="Reserve-chart"></canvas>
        <span class="title">Total Reservations</span>
    </div>
    <div class="box d-flex flex-column justify-content-between col-11 col-lg-5 m-3">
        <canvas id="pieVoiture"></canvas style="max-height:300px">
        <span class="title">Voitures reservées</span>
    </div>

</section>
</div>
<input type="hidden" id="clientReservation" value ="{{json_encode($data)}}">
<input type="hidden" id="pieData" value ="{{json_encode($pieData)}}">
@endsection
