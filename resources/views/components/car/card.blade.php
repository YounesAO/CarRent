<div class="card m-1 p-2 shadow">
    <div class="card-info ">
        <h6>   </h6>

        <img  class="imgcar" src="{{ asset("images").'/'}}@php echo$car->image== null ? 'car.png':$car->image @endphp" alt="">
        <p>status :
            @if($car->status==null || ($car->status!=null && strtotime($car->status->dateRetour)<time()))
            <span style="color:rgb(9, 199, 50);" > Disponible</span>
            @else
            <span style="color:red" >non Disponible</span>
            @endif
        </p>
        <h6>{{$car->kilometrage}} km</h6>


    </div>
    <h3 >{{$car->marque->marque}} {{$car->model->model}}</h3>
    <div class="d-flex justify-content-center buttons">
        @if (isset($entretient))
        <a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('add/entretient')}}/{{$car->id}}">Rendre entretien</a>
        
        @else
        
        
        <a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a>
            @if($car->status==null || ($car->status!=null && strtotime($car->status->dateRetour)<time()))
                <a class="col-5 btn btn-outline-warning m-1" href="{{ asset('add/reservation')}}/{{$car->id}}">reserve</a>
            @endif   
        @endif

    </div>     
</div>