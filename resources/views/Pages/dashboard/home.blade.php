@extends('dashboard')
@section('content')
<div class=" d-flex justify-content-between m-5">
    <div onclick="window.location.href +='/cars';" class="m-1 widget " style="color:rgb(146, 37, 236);background-color: rgba(137, 43, 226, 0.24)">
        <div class="icon">
            <i class="fa-solid fa-car"></i>
        </div>
        <div class="body">
            <span class="num">12</span>
        <span class="desc">Total des voitures</span>
        </div>
    </div>
    
    <div class="m-1 widget " style="color :rgb(25, 196, 10);  background-color:rgba(43, 226, 119, 0.24)" onclick="window.location.href +='/reservation';">
        
        <div class="icon">
            <i class="fa-solid fa-tags"></i>
        </div>
        <div class="body">
            <span class="num">12</span>
            <span class="desc">Reservation en cours</span>
        </div>
    </div>
    
    <div class="m-1 widget " style="color :rgb(255, 217, 0); background-color: rgba(226, 192, 43, 0.24)" onclick="window.location.href +='/incom';">
        <div class="icon">
            <i class="fa-solid fa-hourglass-half"></i>
        </div>
        <div class="body">
            <span class="num">12</span>
            <span class="desc">Paiements en attente</span>
        </div>
    </div>
    
    <div class="m-1 widget " style="color:rgb(209, 25, 25); background-color: rgba(226, 43, 150, 0.24)" onclick="window.location.href +='/entretient';">
        
        <div class="icon">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="body">
            <span class="num">12</span>
            <span class="desc">Entretien alerts</span>
        </div>
        
    </div>
</div>
@endsection
<style>

#Home i {
    color: white;
}
</style>