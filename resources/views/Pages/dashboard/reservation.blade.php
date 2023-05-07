@php $title ="Informations sur la reservation"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Reservations en cours</h3> 
    <a href="reservation/history"><svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
        <circle cx="1" cy="1" r="1" />
      </svg> Historique</a>
</div>
@endsection
@section('content')
<style>
    #reservation i {
        color: white !important;
    }
    #reservation::after {
        opacity: 1 !important;
    }
</style>
<div class="m-5">
    <div id="hidden" class=" reservation-unpaid ">
        @foreach ($reservations as $reservation)
            @include('components.reservation.widget')
        @endforeach
        
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    $('.reservation-unpaid').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1
    });
    

}, false);

</script>


@endsection

