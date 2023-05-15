@php $title ="Modifier les inforrmation du client " @endphp
@extends('dashboard')
@section('header')
<div class="m-3">
    <h4>Modifier les inforrmation du client</h4>
</div>
@endsection
@section('content')
@section('url',' ')
@section('prenomClient',$client->prenomClient)
@section('nomClient',$client->nomClient)
@section('CIN',$client->CIN)
@section('adresseClient',$client->adresseClient)
@section('dateNaissance',$client->dateNaissance)
@section('nationalite',$client->nationalite)
@if(isset($client->photoCIN))
@section('photoCIN',$client->photoCIN)
@endif
@section('numPermis',$client->permis->numPermis)
@section('datePermis',$client->permis->datePermis)
@section('villePermis',$client->permis->villePermis)
@if(isset($client->permis->photoPermis))
@section('photoPermis',$client->permis->photoPermis)
@endif
@include('components.client.add')

@endsection