@php $title ="Bienvunue "@endphp

@include('layouts.head')
@extends('layouts.app')
@section('header','S\'authentifier à votre espace')
@section('content')


<div class="d-flex col-12 flex-column align-items-center justify-content-center">

    <div class="d-flex  flex-column align-items-center justify-content-center col-10 col-md-8 col-lg-6 shadow-lg">
        <img src="{{asset('images/cars/car.png')}}" alt="logo" style="width:200px;">
        <form action="/login" method="post">
            @csrf
            <label for="email" class="form-label">Nom utilisateur :</label>
            <input type="email" name="email" id="" class="form-control">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" name="password" id="" class="form-control">
            <input class="btn btn-success m-1 col-6" type="submit" value="Connecter">
        </form>
    </div>

</div>

{{-- 

<form class=" d-flexcol-md-8 col-11 align-items-center" action="/login" method="POST" style="">
    @csrf
    <div class="p-5 col-md-8 col-11 shadow-lg d-flex flex-column justify-content-center align-items-center " style=" border-radius: 10px;   background-color: white;" >
        <img class="m-1 p-3" src="{{asset('images/cars/car.png')}}" alt="" srcset="" style="width:200px;">
        <div class="d-flex  col-8 col-md-4 flex-column">
            <label class="form-label" for="email">Nom d'utilisateur :</label>
            <input class="form-control" type="text" name='email'>
        </div>
        <div class="d-flex flex-column">
            <label for="password">Mot de passe :</label>
            <input class="form-control" type="password" name ='password'>
        </div>
        <div class="d-flex justify-content-start">
            <input class="btn btn-outline-success m-1" type="submit" value="S'authentifier" >
        </div> --}}
        @if ($errors->any())
    
        <ul>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
            @endforeach
        </ul>
   
@endif
    </div>
</form>
@endsection