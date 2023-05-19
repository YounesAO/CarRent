@php $title ="Informations sur la reservation"@endphp

@extends('dashboard')
@section('header')
<div class="d-flex style1 bg-4  justify-content-between m-1 p-3">
    @if(isset($bool))
    <h3>Liste de tous les Chèques</h3>
    @else
    <h3>Liste des Chèques en cours de traitement</h3> 
    @endif
  <div class="d-flex ">
    <a class="btn shadow-none m-1 btn-warning" href="incom/history">Historique</a>
  </div>
</div>
@endsection
@section('content')
<div class="m-2 p-3">
    <table id="tableCheques" class="table">
        <thead>
            <tr>
                <th>Id chèque</th>
                <th>Date de chèque</th>
                <th>Nom du client</th>
                <th>Montant</th>
            </tr>
        </thead>
        @foreach ($cheques as $c)
            <tr>
                <td>{{$c->idCheque}}</td>
                <td>{{$c->dateCheque}}</td>
                <td>{{$c->client->nomComplet}}</td>
                <td>{{$c->montant}}</td>
            </tr>
        @endforeach
    </table>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#tableCheques').DataTable({
        pagingType: 'full_numbers',
        language: {
            url: '{{ asset("lang/fr-FR.json") }}',
        }
    });

}, false);
</script>
@endsection