@php $title ="Ajouter un entretien d'une voiture"@endphp

@extends('dashboard')
@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert m-1 p-0 alert-danger">
        <ul>
            <li>{{ $error }}</li>
        </ul>
    </div>
@endforeach
@endif
<div class="d-flex reverse-column">
   
    <div class="entretient-form m-1">
        @include('components.car.card')
        <div class="d-flex ">
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
            <span></span>
        </div>
    </div>
    <div class="m-2 fw">
        <form class="col-11"action="" method="POST">
            @csrf
            <fieldset>
            <legend>information sur l'entretien</legend> 
            
            <label for="nomAtelier" >Atelier</label>
            <input type="text" class="form-control" name="nomAtelier" placeholder="N'est pas obligatoire">
            <label for="adresse" >Adresse d'atelier</label>
            <input type="text" class="form-control" name="adresse"  placeholder="N'est pas obligatoire" >
            <label for="montant" >Montant total</label>
            <input type="text" class="form-control" name="montant" required> 
            <label for="kilometrage" >kilometrage</label>
            <input type="text" class="form-control" name="kilometrage" value="{{$car->kilometrage}}"> 
            <label for="date" >Date d'entretien</label>
            <input type="date" class="form-control" name="date" required>
            </fieldset>
            <legend>Choisie les pièces changées</legend>
            <div class=" d-flex reverse-row justify-content-center">
                @php $i=0 @endphp
                @foreach ($pieces as $one)
                @php $i++ @endphp
                @if ( $i==1 || $i== (count($pieces) + count($pieces) % 2) / 2 )
                    <div class="row col-5">
                        <fieldset>
                @endif
                    <div class="col {{$i}}">
                        <label class="form-check-label m-1" for="idPiece[]">{{$one->nom}}</label>
                        <input class="form-check-input" type="checkbox" name="idPiece[]"  value ="{{$one->idPiece}}" >
                    </div>
                    @if ( $i==count($pieces) ||$i == intdiv(count($pieces), 2) )
                        </fieldset>
                    </div>
                    @endif
                @endforeach
            </div>
           <div class="d-flex justify-content-center m-3">
            <input  class ="btn btn-outline-primary m-1"type="submit" value="Envoyer">
            <input class ="btn btn-outline-danger m-1" type="reset" value="Vider">

           </div>
        </form>
    </div>
    
</div>
@endsection

<style>
    #fix i {
        color: white;
    }
</style>