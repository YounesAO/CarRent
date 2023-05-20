@php $title = "reservatons" @endphp
@include('layouts.head')
<body>
    <style>
        body{
            overflow: hidden;
        }
    </style>
    <div class="m-5">
        <div id="hidden" class=" reservation-unpaid ">
           @if($reservations->count()>0)
                @foreach ($reservations as $reservation)
                    @include('components.reservation.widget')
                @endforeach
            @else
            <div class="d-flex justify-content-center align-items-center">
                <span>Aucune reservation </span>
            </div>
            @endif
        </div>
    </div>
    
    <script>
    window.addEventListener('resize', function() {
            location.reload();
        });
        var n =(window.matchMedia("(min-width: 720px)").matches)?4:1;
    $(document).ready(function(){
        $('.reservation-unpaid').slick({
        infinite: false,
        slidesToShow:n,
        slidesToScroll: 1,
        dots: true,
    
        });
        
    
    }, false);
    
    </script>
</body>