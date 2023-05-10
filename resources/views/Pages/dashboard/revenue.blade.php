@php $title ='Analyse des revuenues'; @endphp
@extends('dashboard')
@section('content')
<div class="d-flex justify-content-center p-3">
    <form action="" method="post">
        @csrf
        <label for="date1">Du</label>
        <input type="date" name="date1" id="">
        <label for="date2">à</label>
        <input type="date" name="date2" id="">
        <select name="voiture" id="">
            <option value="">Toutes les Voitures</option>
            @foreach($voitures as $voiture)
            <option value="{{$voiture->id}}">{{$voiture->marque->marque}} {{$voiture->model->model}}</option>
            @endforeach
        </select>
        <button type="submit">Filtrer</button>

    </form>

</div>
<div class="d-flex justify-content-center flex-column align-items-center "> 

    <section class="d-flex justify-content-around flex-wrap col-12">
        <div class=" col-lg-3 col-11 col-md-4 stats bg-warning m-1 p-3">
            <span>Total revenues</span>
            <span class="montant">{{$revenue->pluck('montant')->sum()}}</span>
        </div>
        <div class="col-lg-2 col-md-4 col-11 stats bg-warning m-1 p-3">
            <span>Total Reservations</span>
            <span class="montant">{{$revenue->count()}}</span>
        </div>
        <div class=" col-lg-2 col-md-3 col-11 stats bg-warning m-1 p-3">
            <span>Total Charges Voiture</span>
            <span class="montant">{{$chargeVoiture->pluck('montant')->sum()}}</span>
        </div>
        <div class="col-lg-2 col-md-5 col-11 stats bg-warning m-1 p-3">
            <span>Total Charges Entreprise</span>
            <span class="montant">{{$chargeEntreprise->pluck('montant')->sum()}}</span>
        </div>
        <div class="col-lg-2 col-md-6 col-11 stats bg-warning m-1 p-3">
            <span>Total Net Revenues</span>
            <span class="montant">{{$revenue->pluck('montant')->sum() - (($chargeEntreprise->pluck('montant')->sum())+($chargeVoiture->pluck('montant')->sum()))}} </span>
        </div>
    </section>
    <section class=" charts d-flex justify-content-around flex-wrap col-12">
        <div class="char col-lg-6 col-11">
            <canvas id="revenuechart"></canvas>
            <span>Les revenues</span>
        </div>
        <div class="char col-lg-6 col-11">
            <canvas id="chargeChart"></canvas>
            <span>Les charges</span>

        </div>

    </section>        
    <input id="data" type="hidden"value="{{json_encode($stats)}}">
    <section>
        <div class="result">
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
   
    }, false);

</script>
@endsection