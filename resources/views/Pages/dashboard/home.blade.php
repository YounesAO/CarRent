@php $title ="Accueil"@endphp

@extends('dashboard')
@section('content')
<div class=" d-flex justify-content-center flex-wrap">
    <div onclick="window.location.href +='/cars';" class="m-1 widget " style="color:rgb(146, 37, 236);background-color: rgba(137, 43, 226, 0.24)">
        <div class="icon">
            <i class="fa-solid fa-car"></i>
        </div>
        <div class="body">
            <span class="num">{{$cars->count()}}</span>
        <span class="desc">Total des voitures</span>
        </div>
    </div>
    
    <div class="m-1 widget " style="color :rgb(25, 196, 10);  background-color:rgba(43, 226, 119, 0.24)" onclick="window.location.href +='/reservation';">
        
        <div class="icon">
            <i class="fa-solid fa-tags"></i>
        </div>
        <div class="body">
            <span class="num">{{$reservations->where('encours',1)->count()}}</span>
            <span class="desc">Reservation en cours</span>
        </div>
    </div>
    
    <div class="m-1 widget " style="color :rgb(255, 217, 0); background-color: rgba(226, 192, 43, 0.24)" onclick="window.location.href +='/incom';">
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
    
    <div class="m-1 widget " style="color:rgb(209, 25, 25); background-color: rgba(226, 43, 150, 0.24)" onclick="window.location.href +='/entretient';">
        
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
<div style="width: 800px;"><canvas id="acquisitions"></canvas></div>

@endsection
<style>

#Home i {
    color: white;
}
</style>