@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Reservations de mois {{$month[1]." ".$month[0]}}</h3> 
    <form class="d-flex justify-content-center align-items-center" action="" method="GET">
        <label class="form-label p-2 mt-2" for="month">Mois</label>
        <input  class="form-control p-1 m-1 " type="month" id="start" name="month" value="" placeholder="choisie le mois ">
        <button class="btn btn-primary p-2" type="submit">  <i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
@endsection
@section('content')
<div class="d-flex m-1">
    <table class="table m-1">
        <tr class="">
            <th>Voiture reservée</th>
            <th>Date de depart</th>
            <th>Date de retour</th>
            <th>Nom de client</th>
            <th>plus</th>
        </tr>
        @foreach($reservations as $r)
            <tr class="">
                <td>{{$r->voiture->marque->marque}} {{$r->voiture->model->model}}</td>
                <td>{{$r->dateDebut}}</td>
                <td>{{$r->dateRetour}}</td>
                <td>{{$r->client->nomClient}} {{$r->client->prenomClient}}</td>
                <td><a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('/check/reservation')}}/{{$r->idReservation}}">view</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

<style>
    #reservation i {
        color: white;
    }
</style>