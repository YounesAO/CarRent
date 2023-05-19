<div class="p-3 shadow">

    <span class="p-3 m-1 ">les Reservations passées</span>    
    @php $nbReservation = 0;@endphp
        @foreach($reservations as $reservation)
        @php $nbReservation ++;@endphp
            @if($nbReservation < 7)
                    @include("components.reservation.notification")
            @endif
        @endforeach    
        <div class="d-flex justify-content-center">
            <a class="btn " href="/dashboard/reservation/history">Total de {{ $nbReservation }} reservations</a> 
        </div>

</div>