@extends('dashboard')
@section('content')
<div class="d-flex m-1">
    <div>

    <h3>Voitures</h3> 
    <a class='btn btn-outline-success'href='{{ asset('/add/car') }}' >Ajouter voitures</a>   
    </div>
    <table class="table m-1">
        <tr class="">
            <th>Marque</th>
            <th>Model</th>
            <th>kilometrage</th>
            <th>Carburant</th>
            <th>plus</th>
        </tr>
        @foreach($cars as $car)
        <tr class="">
            <td>{{$car->marque->marque}}</td>
            <td>{{$car->model->model}}</td>
            <td>{{$car->kilometrage}}</td>
            <td>{{$car->carburant}}</td>
            <td><a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a></td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

<style>
    #cars i {
        color: white;
    }
</style>