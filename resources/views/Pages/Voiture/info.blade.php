@php $title = $nom = $car->marque->marque ." ".$car->model->model.' informations'@endphp
@include('layouts.head')
@extends('layouts.app')
@php $nom = $car->marque->marque ." ".$car->model->model @endphp
@section('header')
<div class="d-flex justify-content-between style1 bg-1 m-1 p-2">
    <h3 class="m-1">
        {{$car->nom}}
    </h3>
    <div class="m-2">
        <a href="/cars/{{$car->id}}/edit" class="btn btn-success shadow-none">Editer</a>
        <a href="/cars/{{$car->id}}/delete" class="btn btn-danger shadow-none">delete</a>
    </div>
</div>
@endsection
@section('content')
    @include('components.car.bio')
@endsection
