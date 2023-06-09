@php $title ="Ajouter le client à la reservation" @endphp

@include('layouts.head')
@extends('layouts.app')
@section('bar')
@include('layouts.bar')
@endsection
@section('mt',5)
@section('active-reservation','active')
@section('content')
<form class = "col-8" action="/check/client" method="POST">
    @csrf
    <input type="hidden" name="id" value ='{{$id}}'>
    <input type="hidden" name="idClient" value ='{{$client->idClient}}'>
    
   <div class="container m-2 w-9 d-flex justufy-content-center flex-wrap">
        <div class="m-2 fw">
            @csrf
            

            <label class="form-label" for="nom">Nom Client</label>

            <input class="form-control" type="text" name="nom" value="{{$client->nomClient}}"  >
            
            <label class="form-label" for="prenom">Prénom</label>
            <input class="form-control" type="text" name="prenom" id="" value="{{$client->prenomClient}}" >
            
            <label class="form-label" for="cin" >CIN</label>
            <input class ="form-control" type="text" name="cin" value="{{$req->cin}}" disabled>

            <label class="form-label" for="dateNaiss">Date de naissance</label>
            <input class="form-control" type="date" name="dateNaiss" id="" value="{{$client->dateNaissance}}" >
            <label class="form-label" for="adresseClient">Adresse de Client</label>
            <textarea class="form-control" name="adresseClient" id="" cols="30" rows="4"  >{{$client->adresseClient}}
            </textarea>
            @if($req['prix']==null)
            <label class="form-label" for="prix">Prix</label>
            <input class="form-control" type="text" name="prix" id="" required>
            @endif
           

           
            
        </div>
        <div class="m-2 fw">
            <label class="form-label" for="numPermis">Numéro de permet</label>
            <input class="form-control" type="text" name="numPermis" id="" value="{{$permis->numPermis}}" >
            
            <label class="form-label" for="datePermis">Date de Permis</label>
            <input class="form-control" type="date" name="datePermis" id=""  value="{{$permis->datePermis}}" >
            
            <label class="form-label" for="villePermis">ville d'obtention du Permis</label>
            <input class="form-control" type="text" name="villePermis" id="" value="{{$permis->villePermis}}" >

            <label class="form-label" for="nationalite">Nationalité</label>
            <input class ="form-control" type="text" name="nationalite" value="{{$client->nationalite}}"  >
            
            <label class="form-label" for="imagePermis">photo du Permis de conduite </label>
            <input class="form-control" type="file"  name="imagePermis" value=""id="" > <br>
            <br>
            <a href="{{ asset('images')}}/{{$permis->photoPermis}}"><img src="{{ asset('images')}}/{{$permis->photoPermis}}" alt="" style="width:100px;"></a><br>
            <label class="form-label" for="photoCIN">photo de la carte d'identite nationale</label>
            <input class="form-control" type="file"  name="photoCIN"  >
            <a href="{{ asset('images')}}/{{$client->photoCIN}}"><img src="{{ asset('images')}}/{{$client->photoCIN}}" alt="" style="width:100px;"></a><br>
            
            
            
            @foreach($req->all() as $key => $data)
            <input type="hidden" name="req [{{$key}}]" value="{{$data}}">
            @endforeach
        </div>
   </div>
   @if($errors->any())
        <div id="error" class="form-text text-danger">error d'ajout des données </div>
   @endif
    <CENter>   
        <input class="btn btn-success m-2" type="submit" value="Enregister">
        <input class="btn btn-dark m-2" type="reset" value="Annuler">
        <a class="btn btn-danger m-2" href="/new/reservation">Retouner</a>
    </CENter>   
</form>
@endsection

