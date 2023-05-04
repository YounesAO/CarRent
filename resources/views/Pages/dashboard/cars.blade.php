@php $title ="Gestion des Voitures"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Voitures</h3> 
    <a class='btn btn-outline-success'href='{{ asset('/add/car') }}' >Ajouter voitures</a>   
</div>
@endsection
@section('content')

<div class="container-fluid m-1">
    <table id="carsTable" class="table m-1">
        <thead>
            <tr class="">
                <th>Marque</th>
                <th>Model</th>
                <th>kilometrage</th>
                <th>Carburant</th>
                <th>plus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr class="">
                    <td>{{$car->marque->marque}}</td>
                    <td>{{$car->model->model}}</td>
                    <td>{{$car->kilometrage}}</td>
                    <td>{{$car->carburant}}</td>
                    <td><a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    #cars i {
        color: white;
    }
</style>
@endsection

