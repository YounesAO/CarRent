@php $title = "profile de Client" @endphp
@extends('dashboard')
@section('content')
<div class="client">
    <section class="header m-2 p-3">
    <div  class="h-info d-flex align-items-center justify-content-around m-1 p-2">
        <div class="icon">
            <i class="fa-solid fa-user"></i>
        </div>
        <div>
            <span>Nom :</span>
            <span>{{$client->nomClient}}</span>

        </div>
        <div> 
            <span>Prenom :</span>
            <span>{{$client->prenomClient}}</span>

        </div>
        <div> 
            <span>CIN :</span>
            <span>{{$client->CIN}}</span>

        </div>
        <div> 
            <span>Adresse :</span>
            <span>{{$client->adresseClient}}</span>

        </div>
        <div> 
            <span>Num Permis :</span>
            <span>{{$client->permis->numPermis}}</span>

        </div>
        
        
    </div>
</section>

<section class="m-2">
    <h3 class="">
        Géneral
    </h3>
    <div>
        <fieldset>
            <legend>information sur le cient</legend>
            <span>date naissance</span>
            <span>nationalite</span>
            <span>carte d'identité :</span>

        </fieldset>
        <fieldset>
            <legend>information sur le perid de conduite</legend>
            <span>date de permis</span>
            <span>ville d'obtention de  permis</span>
            <span>carte d'identité :</span>
            <span>photo de permis</span>

        </fieldset>
    </div>
</section>
<section class="d-flex col-12 flex-wrap">
    <div class="box col-5">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex reiciendis ut id similique, enim suscipit! Ex reprehenderit eum quos, tempora nobis distinctio enim, error natus, delectus labore iste repudiandae. Aspernatur.</p>
        <span>Reservation</span>
    </div>
    <div class="box col-5">
        <span>Revenues</span>
    </div>
</section>
</div>

@endsection
