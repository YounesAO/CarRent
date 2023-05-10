<div class="card m-1 p-2 shadow">
    <div class="card-info ">
        <img  class="imgcar" src="{{ asset("images").'/'}}@php echo$car->image== null ? 'cars/car.png':$car->image @endphp" alt="">
        <p>status :
            @if($car->status==null || ($car->status!=null && strtotime($car->status->dateRetour)<time()))
            <span style="color:rgb(9, 199, 50);" > Disponible</span>
            @else
            <span style="color:red" >non Disponible</span>
            @endif
        </p>
        <span class="info">{{$car->kilometrage}} km</span>


    </div>
    <span class="info" >{{$car->marque->marque}} {{$car->model->model}}</span>
    <div class="d-flex justify-content-center buttons">
        @if (isset($entretient))
        <a class="col btn btn-outline-primary  m-1" href="{{ asset('add/entretient')}}/{{$car->id}}">Rendre entretien</a>
        
        @elseif(isset($charge))
        <a class="col btn btn-outline-warning m-1" href="{{ asset('dashboard/charge/voiture')}}/{{$car->id}}">Ajouter charge</a>
        @else
        <a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a>
            @if($car->status==null || ($car->status!=null && strtotime($car->status->dateRetour)<time()))
                @if(isset($req))
                    <a class="col-5 btn btn-outline-warning m-1" href="{{ asset('new/reservation')}}/{{$car->id}}/?req={{$req}}">Reserver</a>
                @else
                    <a class="col-5 btn btn-outline-warning m-1" href="{{ asset('add/reservation')}}/{{$car->id}}">Reserver</a>
                @endif
            @endif
        @endif

    </div>     
</div>