<div class="w-9 p-3 m-1 shadow">
    <div class=" bio d-flex">
        <div class=" car m-2">
            <span class="info">marque</span>
            <span class="info data">{{$car->marque->marque}}</span>
            <span class="info">model :</span>
            <span class="info data">{{$car->model->model}}</span>
            <span >kilometrage</span>
            <span class="info data">{{$car->kilometrage}}km</span>
            <!-- test four wheel drive-->
            @if($car->FWD)
            <span><i class="fa-solid fa-truck-monster"></i> 4WD </span>
            @else
            <span><i class="fa-solid fa-car-side"></i> 2x4</span>
            @endif
            <!-- test A/C -->
            @if($car->AC)
            <span><i class="fa-solid fa-snowflake"></i> Climatisation </span>
            @endif
            <!-- test Automatic gear-->
            @if($car->auto)
            <span><i class="fa-solid fa-gears"></i> Boite automatique</span>
            @else
            <span><i class="fa-solid fa-gear"></i> Boite Manuelle</span>
            @endif
            <span><i class="fa-solid fa-user-large"></i>{{$car->nbPlaces}} Places</span>
            <span><i class="fa-solid fa-car"></i>{{$car->nbportes}} Portes</span>
        </div>
        <div class="m-2 car-container">
            <img class="imgCar"src="{{ asset("images").'/'}}@php echo$car->image== null ? 'cars/car.png':$car->image @endphp" alt="">
        </div>
    </div>
    <div class="m-2">
        <a href="{{ asset('cars').'/'.$car->id.'/edit' }}" class="btn btn-success">Editer</a>
        <a href="/cars/{{$car->id}}/delete" class="btn btn-danger">delete</a>
    </div>
<div class="">
    les reservations passées:
    @foreach($reservations as $reservation)
    @include("components.reservation.widget")
    @endforeach
</div>
</div>