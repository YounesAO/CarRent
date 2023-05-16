@php $title="Catalogue des voitures" @endphp
@include('layouts.head')
@section('title','Catalogue des voitures')
@extends('layouts.app')
@section('header')
<div class="style1 bg-1 m-1 p-3">
  <h4>Catalogue des voitures</h4>
</div>
@endsection
@section('content')
  <div class="d-flex flex-wrap cars">
    @foreach ($voitures as $car)
        @include('components.car.card')
        
    @endforeach
  
  </div>
@endsection