<div class=" card reservation shadow m-1 p-3">
    <div>
        <span class="bold">{{$reservation->voiture->marque->marque." ".$reservation->voiture->model->model}}</span>
    </div>
    <div>
        <span>Client : <span class="bold">{{$reservation->client->nomClient." ".$reservation->client->prenomClient}}</span></span>
    </div>
    <div>
        <span>Durée de reservarion: <span class="bold">{{$reservation->duree}}</span> jours</span>
       
    </div>
    <div>
        <span>Etat : 
            @if(!$reservation->encours)
                <span class='bold text-danger'>Reservation terminée</span>
            @else
                <span class='bold text-success'>Reservation en cours</span>
            @endif
        </span>
    </div>
    <div>
        <span>Montant</span>
        <span class="bold">{{$reservation->montant}}</span>
        <a href="/check/reservation/{{$reservation->idReservation}}" target="_parent">plus</a>
    </div>

</div>