<div class="m-2 p-3  d-flex flex-column shadow resNotif">
    <span>Resevation N°: <span>{{$reservation->idReservation}}</span></span>
    <span>Client CIN :<span>{{$reservation->client->CIN}}</span></span>
    <span>Durré : <span>{{$reservation->duree}}</span> Jours</span>
    <span>du <span>{{$reservation->dateDebut}} </span>à<span> {{$reservation->dateRetour}}:</span></span>
</div>