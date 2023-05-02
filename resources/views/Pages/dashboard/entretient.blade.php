@php $title ="Gestion des entretiens"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Entretiens</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home  d-flex flex-wrap">
    @foreach ($voitures as $car)
        @include('components.car.card')
    @endforeach
</div>

@endsection
<style>
    #fix i {
        color: white;
    }
</style>