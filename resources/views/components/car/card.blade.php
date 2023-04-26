<div class="card m-1 p-2 shadow">
    <div class="card-info ">
        <h6>{{$car->kilometrage}} km</h6>
        <img  class="imgcar" src="{{ asset("images").'/'}}@php echo$car->image== null ? 'car.png':$car->image @endphp" alt="">
        <p>status {{$car->stats}}</p>
    </div>
    <h3 >{{$car->marque->marque}} {{$car->model->model}}</h3>
    <div class="d-flex justify-content-center p-">
        @if (isset($entretient))
        <a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('add/entretient')}}/{{$car->id}}">Rendre entretien</a>
        
        @else
        
        <a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a>
        <a class="col-5 btn btn-outline-warning m-1" href="{{ asset('add/reservation')}}/{{$car->id}}">reserve</a>
            
        @endif
    </div>     
</div>