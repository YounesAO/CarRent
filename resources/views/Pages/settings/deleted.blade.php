@php $title = "Paramètres :Eléments Supprimés " @endphp
@extends('dashboard')

@section('content')
<div class="m-3 fw">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <ul class="nav fw nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#Clients">Clients</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Voitures" >Voitures</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#reservations" >Reservations</a>
        </li>
        
    </ul>
</div>
<div class="tab-content fw m-2 ">
    <div id="Clients" class ="tab-pane active m-2">
      <h3>les clients supprimés</h3>
      <table class="table col-8">
        <thead>
            <tr>
                <th>Id client</th>
                <th>Nom du client</th>
                <th>Cin de client</th>
                <th>Date de suppression</th>
                <th>Actions</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $c)
            <tr>
                <td>{{$c->idClient}}</td>
                <td>{{$c->nomClient}}</td>
                <td>{{$c->CIN}}</td>
                <td>{{$c->deleted_at}}</td>
                <td><a href="/restore/client/{{$c->idClient}}" class="btn btn-success">Restaurer</a></td>
            </tr>
            
            @endforeach
           
        </tbody>
      </table>
    </div>

    <div id="reservations" class="tab-pane fade m-2">
        <h3>les reservation supprimées :</h3>
        <table class="table col-8">
            <thead>
                <tr>
                    <th>id Reservation</th>
                    <th>Date debut</th>
                    <th>Date retour</th>
                    <th>Date de suppression</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $r)
                    <td>{{$r->idReservation}}</td>
                    <td>{{$r->dateDebut}}</td>
                    <td>{{$r->dateRetour}}</td>
                    <td>{{$r->deleted_at}}</td>
                    <td><a href="/restore/reservation/{{$r->idReservation}}" class="btn btn-success">Restaurer</a></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="Voitures" class="tab-pane fade">
      <h3>list des voitures supprimées</h3>
      <table class="table col-8">
        <thead>
            <tr>
                
                <th>id Voiture</th>
                <th>Voiture </th>
                <th>Date de suppression </th>
               
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            
            @foreach ($voitures as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->nom}}</td>
                <td>{{$v->deleted_at}}</td>
               
                <td><a href="/restore/voiture/{{$v->id}}" class="btn btn-success">Restaurer</a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    </div>
  </div>
@endsection