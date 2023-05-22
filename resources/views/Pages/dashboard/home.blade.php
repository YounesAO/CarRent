@php $title ="Accueil"@endphp

@extends('dashboard')
@section('content')
<div class=" d-flex justify-content-center flex-wrap">
    <div class=" m-1 mt-4 widget  " style="color:rgb(70 0 127);background-color: rgba(198 193 255 / 70%)" onclick="window.location.href +='/cars';" >
        <div class="icon">
            <i class="fa-solid fa-car"></i>
        </div>
        <div class="body">
            <span class="num">{{$cars->count()}}</span>
        <span class="desc">Total des voitures</span>
        </div>
    </div>
    
    <div class="m-1 mt-md-4 widget  " style="color :rgb(33 157 25);  background-color:rgba(43, 226, 119, 0.24)" onclick="window.location.href +='/reservation';">
        
        <div class="icon">
            <i class="fa-solid fa-tags"></i>
        </div>
        <div class="body">
            <span class="num">{{$reservations->where('encours',1)->count()}}</span>
            <span class="desc">Reservation en cours</span>
        </div>
    </div>
    
    <div class="m-1 mt-lg-4 widget  " style="color :rgb(255 152 0); background-color: rgba(226, 192, 43, 0.24)" onclick="window.location.href +='/incom';">
        <div class="icon">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
        <div class="body">
            <span class="num">
                @php
                $nbPaiement=0;
                foreach($reservations as $reservation){
                    if($reservation->paiement!=null && $reservation->paiement->cheque!=null && $reservation->paiement->cheque->encours){
                    $nbPaiement++;
                    
                    }
                }
                echo $nbPaiement;
                @endphp
                
            </span>
            <span class="desc">Paiements en attente</span>
        </div>
    </div>
    
    <div class="m-1 mt-xl-4 widget  " style="color:rgb(209, 25, 25); background-color: rgba(226, 43, 150, 0.24)" onclick="window.location.href +='/entretient';">
        
        <div class="icon">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="body">
            <span class="num">  
            @php
            $nbAlerts=0;
            foreach($cars as $car){
            $nbAlerts += count($car->entretients);
            }
            echo $nbAlerts;
            @endphp 
            
            </span>
            <span class="desc">Entretien alerts</span>
        </div>
        
    </div>
</div>
<section class="d-flex flex-wrap">
    <div class="box d-flex flex-column col-11 col-lg-6 m-3" >
        <canvas class="fw p-1" id="line-chart"></canvas>
        <span class="title">Total reservation mois </span>

    </div>
    <div class="box d-flex flex-column col-11 col-lg-5 m-3">
        @foreach($topCars as $car)
        <div class="d-flex m-1 fw shadow  top p-2" onclick="window.location.href ='cars/{{$car->voiture->id}}';" >
            <img src="{{ asset('images').'/'.$car->voiture->image }}" alt="">
            <div class="info">
                <span class="marque">    {{$car->voiture->marque->marque}}        </span>
                <span>    {{$car->voiture->model->model}}        </span>
            </div>
            <span class="nbResevation">    {{$car->nbReservation}}        </span>
        </div>
        @endforeach
        <span class="title">Voitures les plus réservées</span>
    </div>

</section>
<section class="d-flex flex-wrap">
    <div class="box  d-flex flex-column justify-content-between  col-11 col-lg-6 m-3" >
        <canvas class="fw p-1" id="bar-duree"></canvas>
        <span class="title">Durée la plus réservée</span>
    </div>

    <div class="box d-flex flex-column justify-content-between col-11 col-lg-5 m-3">
        <canvas id="pieChart"></canvas>
        <span class="title">Reservations par voitures</span>
    </div>

</section>

<input id="stats" type="hidden"value="{{json_encode($stats)}}">
<input id="stats-reservation" type="hidden"value="{{json_encode($statsReservation)}}">
<input id="duree" type="hidden"value="{{json_encode($duree)}}">

@endsection
<style>

#Home i {
    color: white;
}
</style>