@php $title = 'Gestion des client'@endphp
@extends('dashboard')
@section('content')
@if(isset($error))
<div class="alert alert-danger m-1">
    {{$error}}
</div>
@endif
<div class=" client-cherche fw  m-2 p-3" >
<form action="{{ url('/profile/client', []) }}" method="POST" class="d-flex  justify-content-center align-items-center flex-wrap">
    @csrf
    <label class="form-label col-lg-4 m-1" for="CIN">Chercher un client par CIN :</label>
    <input class="form-control col-lg-4 m-1" type="text" name="CIN">
    <input class="btn btn-success col-lg-2 col-sm-3 col-11 m-1" type="submit" value="Chercher">
</form>
</div>
<style>
       #client i {
        color: white !important;
    }
    #client::after{
        opacity: 1 !important;
    }
</style>
@endsection