@php $title="Catalogue des voitures" @endphp
@include('layouts.head')
@section('title','Catalogue des voitures')
@extends('layouts.app')
@section('header','Catalogue des voitures')
@section('content')
  <div class="d-flex flex-wrap cars">
    @foreach ($voitures as $car)
        @include('components.car.card')
        
    @endforeach
  
  </div>
@endsection