@php $title ="Informations sur la reservation"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Reservations en cours</h3> 
  <div class="d-flex ">
    <a class="btn shadow-none m-1 btn-warning" href="reservation/history">Historique</a>
    <a class="btn btn-success m-1"href="/new/reservation">Ajouter Reservation</a>
  </div>
</div>
@endsection
@section('content')
<style>
    #reservation i {
        color: white !important;
    }
    #reservation::after {
        opacity: 1 !important;
    }
</style>

<iframe class="slide-reservation" src="/slide/reservation" frameborder="0"></iframe>
<h3>Reservations non payseé </h3> 

<iframe class="slide-reservation" src="/slide/reservation/unpaid" frameborder="0"></iframe>


@endsection

