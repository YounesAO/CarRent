@php $title ="Bienvunue "@endphp

@include('layouts.head')
@extends('layouts.app')
@section('header','S\'authentifier à votre espace')
@section('content')

<form class=" d-flex align-items-center" action="welcome" method="POST" style="">
    @csrf
    <div class="p-5 btn-outline-success  shadow-lg d-flex flex-column justify-content-center align-items-center " style=" border-radius: 10px;   background-color: white;" >
        <img src="{{asset('images/cars/car.png')}}" alt="" srcset="" style="width:200px;">
        <div class="d-flex flex-column">
            <label for="email">Nom d'utilisateur :</label>
            <input class="form-control" type="text" name='email'>
        </div>
        <div class="d-flex flex-column">
            <label for="password">Mot de passe :</label>
            <input class="form-control" type="password" name ='password'>
        </div>
        <div class="d-flex justify-content-start">
            <input class="btn btn-outline-success m-1" type="submit" value="S'authentifier" >
        </div>
    </div>
</form>
@endsection