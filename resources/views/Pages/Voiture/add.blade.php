@extends('layouts.head')

@section('title','Ajouter une voiture page')
@extends('dashboard')
@section('header')
<h3 class="m-1">Ajouter une voiture</h3>
@endsection
@section('content')
    @include('components.car.addForm')
@endsection
