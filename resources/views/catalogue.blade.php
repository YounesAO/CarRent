@include('layouts.head')
@section('title','Catalogue des voitures')
@extends('layouts.app')
@section('header','Catalogue des voitures')
@section('content')

    @foreach ($voitures as $car)
        @include('components.car.card')
    @endforeach
@endsection