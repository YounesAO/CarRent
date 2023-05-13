@php $title = "parametres de l'application"@endphp
@extends('dashboard')

@section('header')
<div class=" style1 align-items-center fw  m-2 p-3" >
    <h3>Paramétres</h3>
</div>
@endsection
@section('content')
    <div class="m-2 d-flex flex-wrap  p-1 ">
        <a href="/settings/user" class=" style1 bg-1  fs-20 item col-12 col-md-3 m-1 p-3">
            <i class="col-1 fa-solid fa-user"></i>
            <span class="fw"> Paramétres de compte</span>
        </a>
        <a href="/settings/general" class=" style1 bg-2 fs-20 item col-12 col-md-3 m-1 p-3">
            <i class="col-1 fa-solid fa-sliders"></i>
            <span class="fw"> Paramétres de géneral</span>
        </a>
        <a href ="/settings/deleted" class=" style1 bg-3 fs-20  item col-12 col-md-3 m-1 p-3">
            <i class="fa-solid fa-ban"></i>
            <span class="fw"> Eléments supprimés</span>
        </a>
    </div>
@endsection
