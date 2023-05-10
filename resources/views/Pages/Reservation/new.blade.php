@php $title ="Nouvelle reservation :"@endphp

@extends('dashboard')
@section('header')
    <h3 class="m-4">Inserer les information de la reservation</h3>
@endsection
@section('content')
<div class="d-flex h-50 justify-content-center align-items-center">
    @include('components.reservation.form')
</div>
@endsection