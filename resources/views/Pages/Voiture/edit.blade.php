@php $title = 'Modifer les informations de '.$nom = $car->marque->marque ." ".$car->model->model  @endphp
@include('layouts.head')

@extends('layouts.app')
@section('header')
<div class="m-1 ">
    <h3 class="p-2">Modifier les informations du {{$car->nom}}</h3>
</div>
@endsection
@section('content')
    @include('components.CaR.editForm')
@endsection
