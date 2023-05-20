<div class="p-3 shadow">

    <span class="p-3 m-1 ">les Reservations passées</span>    
    <iframe class="slide-reservation" src="/slide/car/reservation/{{$car->id}}" frameborder="0"> </iframe>
   
        <div class="d-flex justify-content-center">
            <a class="btn " href="/dashboard/reservation/history">Total de {{ $reservations->count() }} reservations</a> 
        </div>

</div>