@php $title ="Information sur les charges"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Charge</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home d-flex flex-column">
    <h3>charge id</h3>
    <span>{{$charge->idCharge}}</span>
    <h3>charge montant</h3>
    <span>{{$charge->montant}}</span>
    <h3>charge categorie</h3>
    <span>{{$charge->categorieCharge}}</span>
    <h3>Date de charge </h3>
    <span>{{$charge->dateCharge}}</span>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editeCharge">Modifier les informations</button>
        <a href="/delete/charge/{{$charge->idCharge}}" class="btn btn-danger">Supprimmer la charge</a>

    </div>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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