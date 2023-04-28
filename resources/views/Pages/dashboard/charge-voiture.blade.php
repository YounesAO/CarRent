@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Charge</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home d-flex">
    @foreach($cars as $car)
    @include('components.car.card')
    @endforeach
</div>

@endsection
<style>
    #charge i {
        color: white !important;
    }
    #charge::after{
        opacity: 1 !important;
    }
</style>