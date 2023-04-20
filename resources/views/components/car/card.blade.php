<div class="card m-0 p-2 shadow">
        <div class="card-info ">
            <h1 class="btn">{{$car->kilometrage}} km</h1>
            <img src="{{ asset("images").'/'}}@php echo$car->image== null ? 'car.png':$car->image @endphp" alt="">
            <p>status</p>
        </div>
        <h1>id : {{$car->id}}</h1>
        <a class="btn btn-success" href="{{ asset('cars')}}/{{$car->id}}">view</a>
</div>