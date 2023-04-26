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
<div class="d-flex">
   
    <div class="entretient-form m-1">
        @include('components.car.card')
        <div class="d-flex">
            <span>last repare </span>
            <span></span>
        </div>
    </div>
    <div class="m-2">
        <form class="flex justify-content-center align-items-center"action="" method="POST">
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
            <div class=" d-flex ">
                @php $i=0 @endphp
                @foreach ($pieces as $one)
                @php $i++ @endphp
                @if ( $i==1 || $i== (count($pieces) + count($pieces) % 2) / 2 )
                    <div class="row">
                        <fieldset>
                @endif
                    <div class="col {{$i}}">
                        <label class="form-check-label m-1" for="idPiece[]">{{$one->nom}}</label>
                        <input class="form-check-input" type="radio" name="idPiece[]"  value ="{{$one->idPiece}}" >
                    </div>
                    @if ( $i==count($pieces) ||$i == intdiv(count($pieces), 2) )
                        </fieldset>
                    </div>
                    @endif
                @endforeach
            </div>
            <input  class ="btn btn-outline-primary "type="submit" value="Envoyer">
            <input class ="btn btn-outline-danger" type="reset" value="Vider">
        </form>
    </div>
    
</div>
@endsection

<style>
    #fix i {
        color: white;
    }
</style>