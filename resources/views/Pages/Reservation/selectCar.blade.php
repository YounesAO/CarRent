@php $title ="Nouvelle Reservation :"@endphp

@extends('dashboard')
@section('header')
    <h3>les voitures disponibles durant <span>{{$req["dateDebut"]}}</span> à <span>{{$req["dateRetour"]}}</span></h3>
@endsection
@section('content')
<div class="d-flex flex-wrap cars">
    @foreach ($voitures as $car)
        @include('components.car.card')
    @endforeach
</div>
@endsection
