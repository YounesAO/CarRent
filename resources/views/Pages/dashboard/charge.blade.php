@extends('dashboard')
@section('header')
<div class="d-flex justify-content-between m-3 p-1">
    <h3>Charge</h3> 
</div>
@endsection
@section('content')
<div class="m-1 home d-flex">
    <a class="btn btn-primary m-2" href="charge/voiture">Ajouter charge Voiture</a>
    <a class="btn btn-primary m-2" href="charge/entreprise">Ajouter charge Entreptise</a>
</div>

<div class="d-flex m-1">
    <table class="table m-2">
        <tr class="">
            <th>Identifiant</th>
            <th>categorie de charge</th>
            <th>Date de charge</th>
            <th>Montant total</th>
            <th>plus</th>
        </tr>
        @foreach($charges as $charge)
            <tr class="">
                <td>{{$charge->idCharge}}</td>
                <td>{{$charge->categorieCharge}}</td>
                <td>{{$charge->dateCharge}}</td>
                <td>{{$charge->montant}}</td>
                <td><a class="col-5 btn btn-outline-primary  m-1" href="{{ asset('/check/charge')}}/{{$charge->idCharge}}">view</a></td>
            </tr>
        @endforeach
    </table>
   
</div>
<div>
    {{ $charges->links() }}

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