@php $title ="Information sur les charges"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Charge</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home d-flex flex-column">
    <h3>charge id</h3>
    <span>{{$charge->idCharge}}</span>
    <h3>charge montant</h3>
    <span>{{$charge->montant}}</span>
    <h3>charge categorie</h3>
    <span>{{$charge->categorieCharge}}</span>
    <h3>Date de charge </h3>
    <span>{{$charge->dateCharge}}</span>
    <a href="edite/{{$charge->idCharge}}" class="btn btn-outline-danger col-1">Edite</a>
</div>

@endsection
<style>
    #charge i {
        color: white !important;
    }
    #charge::after{
        opacity: 1 !important;
    }
</style>