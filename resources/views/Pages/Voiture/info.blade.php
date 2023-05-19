@php $title = $nom = $car->marque->marque ." ".$car->model->model.' informations'@endphp
@include('layouts.head')
@extends('layouts.app')
@php $nom = $car->marque->marque ." ".$car->model->model @endphp
@section('header')
<div class="d-flex justify-content-between style1 bg-1 m-1 p-2">
    <h3 class="m-1">
        {{$car->nom}}
    </h3>
    @auth        
    <div class="m-2">
        <a href="/cars/{{$car->id}}/edit" class="btn btn-success shadow-none">Editer</a>
        <a href="/cars/{{$car->id}}/delete" class="btn btn-danger shadow-none">delete</a>
    </div>
    @endauth

</div>
@endsection
@section('content')
   <div class="d-flex fw flex-column">
    @include('components.car.bio')
    @include('components.car.stats')
    @include('components.car.pastReservation')

   </div>

@endsection
