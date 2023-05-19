<div class="">
    <div class=" bio shadow col-12 d-flex justify-content-around flex-wrap-reverse p-3">
        <div class=" car col-12 col-md-6 m-2">
            <span class="info">Marque</span>
            <span class="info data">{{$car->marque->marque}}</span>
            <span class="info">Model :</span>
            <span class="info data">{{$car->model->model}}</span>
            <span >Date du model :</span>
            <span class="info data">{{$car->model->annee}}</span>
            <div class="options d-flex flex-wrap">
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-user-large"></i> {{$car->nbPlaces}} Places</span>
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-car"></i> {{$car->nbportes}} Portes</span>
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-gas-pump"></i> {{$car->carburant}} </span>
                
                    <!-- test four wheel drive-->
                @if($car->FWD)
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-truck-monster"></i> 4WD </span>
                @else
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-car-side"></i> 2x4</span>
                @endif
                <!-- test A/C -->
                @if($car->AC)
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-snowflake"></i> Climatisation </span>
                @endif
                <!-- test Automatic gear-->
                @if($car->auto)
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-gears"></i> Boite automatique</span>
                @else
                <span class="style1 optionz m-1 p-2 col-5 col-md-4"><i class="fa-solid fa-gear"></i> Boite Manuelle</span>
                @endif
            </div>
        </div>
        <div class="m-2 col-md-4 car-container">
            <img class="imgCar"src="{{ asset("images").'/'}}@php echo$car->image== null ? 'cars/car.png':$car->image @endphp" alt="">
        </div>
    </div>
</div>
