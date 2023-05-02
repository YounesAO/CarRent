@php $title ="Informations sur la reservation"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Reservations</h3> 
    <div class="d-flex m-1">
        <form  action="" method="GET">
            <label class="form-label" for="month">Choisir le mois</label>
            <input  class="form-control" type="month" id="start" name="month">
            <button type="submit">o</button>
        </form>
    </div>
</div>
@endsection
@section('content')
   <div class="d-flex flex-wrap justify-content-center">
    @foreach ($reservations as $reservation)
        @include('components.reservation.widget')
    @endforeach
   </div>
@endsection

<style>
    #reservation i {
        color: white !important;
    }
    #reservation::after {
        opacity: 1 !important;
    }
</style>