<div class=" card reservation shadow m-1 p-3">
    <div>
        <span>{{$reservation->voiture->marque->marque." ".$reservation->voiture->model->model}}</span>
    </div>
    <div>
        <span>Client : {{$reservation->client->nomClient." ".$reservation->client->prenomClient}}</span>
    </div>
    <div>
        <span>Durée de reservarion: {{$reservation->duree}} jours</span>
       
    </div>
    <div>
        <span>Etat : 
            @if($reservation->encours)
                <span class='text-danger'>Reservation terminée</span>
            @else
                <span class='text-success'>Reservation en cours</span>
            @endif
        </span>
    </div>
    <div>
        <span>Montant</span>
        <span>{{$reservation->montant}}</span>
        <a href="/check/reservation/{{$reservation->idReservation}}">plus</a>
    </div>

</div>