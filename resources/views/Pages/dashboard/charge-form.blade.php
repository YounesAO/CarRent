@php $title ="Ajouter une charges"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Charge</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home d-flex">
    @include('components.car.card')
    
    <div class="m-1 w-9">
        <form action="" method="post">
            @csrf
            <label class="form-label" for="nature">Nature charge</label>
            <input class="form-control" type="text" name="nature" id="">
            <label class="form-label" for="dateCharge">Date de charge</label>
            <input class="form-control" type="date" name="dateCharge" id="">
            <label class="form-label" for="montant">Montant</label>
            <input class="form-control" type="text" name="montant" id="">
            <div class="m-1">
                <input  class ="btn btn-outline-primary "type="submit" value="Envoyer">
                <input class ="btn btn-outline-danger" type="reset" value="Vider">
            </div>
        </form>
    </div>
    
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