@php $title="Modifier les information de la model : $model->model"@endphp
@extends('dashboard')
@section('header')
    <h5>Modification de Model  {{$model->model}}</h5>
@endsection
@section('content')
<div class='fx d-flex justify-content-center align-items-center'>
    <form action="/edite/model" method='post' class="col-8">
        @csrf
        <input type="hidden" name="idModel" value="{{$model->idModel}}"> 
        <label for="model" class="form-label">Nom de model</label>
        <input class="form-control" type="text" name="model" value ="{{$model->model}}"> 
        <label for="annee" class="form-label">Année de model</label>
        <input class="form-control" type="year" name="annee" value ="{{$model->annee}}"> 
        <input class="btn btn-success m-1" type="submit" value = "Valider">
    </form>
</div>
@endsection
