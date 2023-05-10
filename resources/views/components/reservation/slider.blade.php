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
           @if($reservations!= null)
                @foreach ($reservations as $reservation)
                    @include('components.reservation.widget')
                @endforeach
            @else
            <div class="d-flex justify-content-center align-items-center">
                <span>aucun reservations encours</span>
            </div>
            @endif
        </div>
    </div>
    
    <script>
    
    $(document).ready(function(){
    
        $('.reservation-unpaid').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
    
        });
        
    
    }, false);
    
    </script>
</body>