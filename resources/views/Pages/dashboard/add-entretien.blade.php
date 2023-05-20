@php $title ="Ajouter un entretien d'une voiture"@endphp

@extends('dashboard')
@section('content')
@if(session('status'))
<div class="alert m-3   alert-success">
    {{session('status')}}
</div>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert m-1 p-0 alert-danger">
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endforeach
@endif
<div class="d-flex flex-wrap">
    <div class="entretient-form m-1">
        @include('components.car.card')
    </div>
    
    <div class="m-2 flex-wrap  fw">
        @if(!isset($form))
            @include('components.entretient.table')
        @else
            @include('components.entretient.form')
        @endif
    </div>
</div>
@endsection

<style>
    #fix i {
        color: white;
    }
</style>