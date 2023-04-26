@extends('dashboard')
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