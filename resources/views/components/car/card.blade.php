<div class="card m-1 p-2 shadow">
    <div class="card-info ">
        <img  class="imgcar" src="{{ asset("images").'/'}}@php echo$car->image== null ? 'cars/car.png':$car->image @endphp" alt="">
        <span class="info" >{{$car->marque->marque}} {{$car->model->model}}</span>

        <p>status :
            @if($car->status==null || ($car->status!=null && strtotime($car->status->dateRetour)<time()))
            <span class="bold" style="color:rgb(22, 163, 52);" > Disponible</span>
            @else
            <span class="bold" style="color:rgb(184, 21, 21)" >Non disponible</span>
            @endif
        </p>
        <div class="options d-flex">
            <span class="info optionz  box p-2 m-1"><i class="bold" >KM </i>{{number_format($car->kilometrage, 2, ',', ' ')}}</span>
            @include('components.car.options-icons')

        </div>

    </div>
    @if(isset($stat))
    <style>.card{height: 100% !important;}</style>
    <div class="d-flex flex-column ">
        <span>Etat des pieces :</span>
        <ul class="m-1 pieces">
        @foreach ($pieces as $item)
            @if (isset($stat[$item->idPiece]))
                <li class=""><img class="piece {{$stat[$item->idPiece]}}" src="{{ asset('images').'/' }}{{$item->img}}" alt="" title="{{$item->nom}}"><span class="nomPieces">{{$item->nom}}</span> </li>
            @else
                <li class=""><img class="piece green" src="{{ asset('images').'/' }}{{$item->img}}" alt="" title="{{$item->nom}}"><span class="nomPieces">{{$item->nom}}</span> </li>
            @endif
        @endforeach
    </ul>
    </div>
    @else
    <div class="d-flex justify-content-center buttons">
        @if (isset($entretient))
        <a class="col btn btn-outline-primary  m-1" href="{{ asset('add/entretient')}}/{{$car->id}}">Rendre entretien</a>
        
        @elseif(isset($charge))
        <a class="col btn btn-outline-warning m-1" href="{{ asset('dashboard/charge/voiture')}}/{{$car->id}}">Ajouter charge</a>
        @else
        <a class="fw btn btn-outline-primary  m-1" href="{{ asset('cars')}}/{{$car->id}}">view</a>
            @auth
                @if(isset($req))
                    <a class="fw btn btn-outline-warning m-1" href="{{ asset('new/reservation')}}/car/{{$car->id}}?cin={{$req->cin}}&dateDebut={{$req->dateDebut}}&dateRetour={{$req->dateRetour}}">Reserver</a>
                @else
                    <a class="fw btn btn-outline-warning m-1" href="{{ asset('add/reservation')}}/{{$car->id}}">Reserver</a>
                @endif
            @endauth
        @endif
    </div>  
    @endif
   
</div>