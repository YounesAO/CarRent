@php $title ="Bienvunue "@endphp

@include('layouts.head')
@extends('layouts.app')
@section('header')
<div class="m-2 p-3">
    <h3>Bienvunue Connectez-vous à votre espace</h3>
</div>
@endsection
@section('content')


<div class="d-flex col-12 flex-column align-items-center justify-content-center">
    
    <div class="d-flex flex-column align-items-center justify-content-around col-12 p-3 col-md-8 col-lg-7 shadow-lg">
        <div class="col-12 ">
            @if ($errors->any())
                <ul class="errors list-unstyled">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li>{{ $error }}</li>
                    </div>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="d-flex p-4 w-100 justify-content-around ">
            <img class="p-1  logo m-2" src="{{ asset('logo.png') }}" alt="logo" style="width:250px;">
            <form class="d-flex flex-column justify-content-center" action="/login" method="post">
                @csrf
                <label for="email" class="form-label">Nom utilisateur :</label>
                <input type="email" name="email" id="" class="form-control">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="" class="form-control">
                <input class="btn  m-1 " style ='background-color: rgb(22, 16, 94);color:yellow;'type="submit" value="Connecter">
                
            </form>
        </div>
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
       
    </div>
</form>
@endsection