@php $title ="Liste des clients"@endphp

@extends ('dashboard')
@section('header')
<div class="d-flex filter-reservation justify-content-between m-3 p-3">
    <h3>Gestion de tous les clients</h3> 
</div>
@endsection
@section('content')
<div class="p-3 m-1">
    <table id="clientTable" class="table m-1 ">
        <thead>
            <tr class="">
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nombre de réservation</th>
                <th>plus</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $c)
            <tr class="">
                <td>{{$c->idClient}}</td>
                <td>{{$c->nomClient}}</td>
                <td>{{$c->prenomClient}}</td>
                <td>{{$c->nbReservation}}</td>
                <td><a class="col-5 btn btn-outline-primary  m-1" href="/profile/client?client={{$c->idClient}}">view</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<style>
    #reservation i {
        color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#clientTable').DataTable({
            pagingType: 'full_numbers',
            language: {
                url: '{{ asset("lang/fr-FR.json") }}',
            }
        });

    }, false);
</script>
@endsection

