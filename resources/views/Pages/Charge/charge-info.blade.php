@php $title ="Information sur les charges"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex style1 bg-3 justify-content-between m-2 p-4">
    <h1 class="">Information sur Charge</h1> 
</div>
@endsection
@section('content')
<div class="m-3 home  d-flex flex-wrap ">
    <div class="widget bg-2  m-1">
        <div class="body p-3 d-flex">
            <h3 class="desc">Identifiant :</h3>
            <span class="num">{{$charge->idCharge}}</span>
        </div>
    </div>

    <div class="widget bg-2 m-1 ">
        <div class="body p-3 d-flex">
            <h3 class="desc">Charge montant (dh) :</h3>
            <span class="num">{{$charge->montant}}</span>
        </div>
    </div>

    <div class="widget bg-2  m-1 ">
        <div class="body p-3 d-flex">
            <h3 class="desc">Categorie de charge:</h3>
            <span class="num">{{$charge->categorieCharge}}</span>
        </div>
    </div>

    <div class="widget bg-2  m-1">
        <div class="body p-3 d-flex">
            <h3 class="desc">Date de charge :</h3>
            <span class="num">{{$charge->dateCharge}}  </span>
        </div>
    </div>

    
</div>
<div class="m-2 d-flex">
    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editeCharge">Modifier les informations</button>
    <a href="/delete/charge/{{$charge->idCharge}}" class="btn btn-danger m-1">Supprimmer la charge</a>

</div>
<div class="modal"  id="editeCharge" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modifier les information de charge</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/edite/charge/{{$charge->idCharge}}">
            <div class="modal-body">
                @csrf
                <label class="form-label" for="montant">Montant de charge :</label>
                <input class="form-control" type="text" name="montant" value="{{$charge->montant}}" required> 
                <label class="form-label" for="dateCharge">Date de charge</label>
                <input class="form-control" type="date" name="dateCharge" id="" value="{{$charge->dateCharge}}" required>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

      </div>
    </div>
  </div>


@endsection
<style>
    #charge i {
        color: white !important;
    }
    #charge::after{
        opacity: 1 !important;
    }
</style>
<script>
    
</script>