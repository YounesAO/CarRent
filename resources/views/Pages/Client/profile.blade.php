@php $title = "profile de Client" @endphp
@extends('dashboard')
@section('content')
<div class="client">
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
        <div class="stats bg-4 col-11 col-md-4 col-lg-2 p-2 mb-2"> 
            <span>CIN :</span>
            <span class="montant">{{$client->CIN}}</span>
        </div>

        <div class="stats bg-4 col-11 col-md-4 col-lg-3 p-2 mb-2"> 
            <span>Adresse :</span>
            <span class="montant">{{$client->adresseClient}}</span>
        </div>

        <div class="stats bg-4 col-11 col-md-4 col-lg-3 p-2 mb-2"> 
            <span>Num Permis :</span>
            <span class="montant">{{$client->permis->numPermis}}</span>
        </div>

        <div class="stats bg-4 col-11 col-md-4 col-lg-3 p-2 mb-2"> 
            <span> Totale reservation :</span>
            <span class="montant">{{count($data)}}</span>
        </div>

        <div class="stats bg-4 col-11 col-md-4 col-lg-3 p-2 mb-2"> 
            <span> Totale revenues :</span>
            <span class="montant">{{array_sum(array_column($data, 'montant'))}} dh</span>
        </div>
        
        
    </div>
</section>

<section class="m-2">
    <h3 class="  style1 p-3 bg-3">
        Information sur le client
    </h3>
    <div class="d-flex  m-2">
            <div class="d-flex col-3 flex-column m-1">
                <span>Date naissance : <span class="bold">{{$client->dateNaissance}}</span></span>
                <span>Nationalite : <span class="bold">{{$client->nationalite}}</span></span>
                <span>Carte d'identité : <span class="bold"><a href="{{ asset("images/$client->photoCIN") }}">Voir</a></span></span>
            </div>
            <div class="d-flex col-5 flex-column m-1">
                <span>Ville d'obtention de permis :<span class="bold">{{$client->permis->villePermis}}</span></span>
                <span>Date de permis : <span class="bold">{{$client->permis->datePermis}}</span></span>
                <span>Photo de permis  : <span class="bold"><a href="{{ asset("images")}}/{{$client->permis->photoPermis}}">Voir</a></span></span>
            </div>
    </div>
</section>
<section class="d-flex col-12 flex-wrap">
    <div class="box d-flex flex-column justify-content-between col-11 col-lg-6 m-3">
        <canvas id="client-chart"></canvas>
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
