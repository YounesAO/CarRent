@php $title="Modifier les informations des pieces et entretien: $piece->nom"@endphp
@extends('dashboard')
@section('header')
    <h5>Modification d'information de piece et entretien  {{$piece->nom}}</h5>
@endsection
@section('content')
<div class='fx d-flex justify-content-center align-items-center'>
    <form action="/edite/piece" method='post' class="col-8" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="idPiece" value="{{$piece->idPiece}}"> 
        <label for="nom" class="form-label">Nom de piece</label>
        <input class="form-control" type="text" name="nom" value ="{{$piece->nom}}"> 
        <label class="form-label" for="img"></label>
        <input class="form-control" type="file" name="img">
        <img src="{{asset("images/$piece->img")}}" alt="" style="width: 30px;"><br>
        <label for="prix" class="form-label">Prix </label>
        <input class="form-control" type="text" name="prix" value ="{{$piece->prix}}"> 
        <label for="description" class="form-label">description</label>
        <input class="form-control" type="text" name="description" value ="{{$piece->description}}">
        <label for="maxKilo" class="form-label">Condition d'entretient par distance (km)</label>
        <input class="form-control" type="text" name="maxKilo" value ="{{$piece->maxKilo}}">
        <label for="maxDurre" class="form-label">Condition d'entretien par durée (jours)</label>
        <input class="form-control" type="text" name="maxDurre" value ="{{$piece->maxDurre}}">
        <input class="btn btn-success m-1" type="submit" value = "Valider">
    </form>
</div>
@endsection
