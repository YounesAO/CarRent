@extends('dashboard')
@php $title ="Ajouter voiture"@endphp

@section('header')
<h3 class="m-1">Ajouter une voiture</h3>
@endsection
@section('content')
    @include('components.car.addForm')
@endsection
