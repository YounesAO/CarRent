@php $title="Modifier les information de la marque : $marque->marque"@endphp
@extends('dashboard')
@section('header')
    <h5>Modification de marque  {{$marque->marque}}</h5>
@endsection
@section('content')
<div class='fx d-flex justify-content-center align-items-center'>
    <form action="/edite/marque" method='post' class="col-8">
        @csrf
        <input type="hidden" name="idMarque" value="{{$marque->idMarque}}"> 
        <label for="marque" class="form-label">Nom de marque</label>
        <input class="form-control" type="text" name="marque" value ="{{$marque->marque}}"> 
        <input class="btn btn-success m-1" type="submit" value = "Valider">
    </form>
</div>
@endsection
