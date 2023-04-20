@include('layouts.head')

@section('title','Ajouter une voiture page')
@extends('layouts.app')
@section('header','Ajouter une voiture')
@section('content')
    @include('components.car.addForm')
@endsection
