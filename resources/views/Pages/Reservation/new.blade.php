@php $title ="Nouvelle reservation :"@endphp

@extends('dashboard')
@section('header')
<div class="m-4">
    <h3 class="">Inserer les information de la reservation</h3>
</div>
@endsection
@section('content')
<div class="d-flex  justify-content-center align-items-center">
    @include('components.reservation.form')
</div>
@endsection