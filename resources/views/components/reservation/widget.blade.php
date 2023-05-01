<div class=" card reservation shadow m-1 p-3">
    <div>
        <span>voiture reservée :{{$reservation->voiture->marque->marque." ".$reservation->voiture->model->model}}</span>
    </div>
    <div>
        <span>Client : {{$reservation->client->nomClient." ".$reservation->client->prenomClient}}</span>
    </div>
    <div>
        <span>Durée de reservarion: {{$reservation->duree}} jours</span>
       
    </div>
    <div>
        <span>Etat : 
            @if($reservation->voiture->disponible)
                <span>Reservation terminée</span>
            @else
                <span>Reservation en cours</span>
            @endif
        </span>
    </div>
    <div>
        <span>Montant</span>
        <span>{{$reservation->duree*$reservation->prix}}</span>
    </div>
    <div>
        <button data-bs-toggle="modal" data-bs-target="#reservation{{$reservation->idReservation}}"class="btn btn-warning m-1">view</button>
        <a href="" class="btn btn-success m-1">payer</a>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="reservation{{$reservation->idReservation}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="" action="" method="post">
        <div class="modal-body">
            <div>
                <span>voiture reservée :{{$reservation->voiture->marque->marque." ".$reservation->voiture->model->model}}</span>
            </div>
            <div>
                <span>Client : {{$reservation->client->nomClient." ".$reservation->client->prenomClient}}</span>
            </div>
            @csrf
            <input type="hidden" name="idVoiture" value="{{$reservation->voiture->id}}">
            <label class="form-label" for="cin">CIN de Client :</label>
            <input class="form-control" type="text" name="cin" value="{{$reservation->client->CIN}}" disabled> 
            <label class="form-label" for="prix">Prix de reservation :</label>
            <input class="form-control" type="text" name="prix" value="{{$reservation->prix}}" > 
            <label class="form-label" for="dateDebut">Date debut</label>
            <input class="form-control" type="date" name="dateDebut" id="" value="{{$reservation->dateDebut}}">
            <label class="form-label" for="dateRetour">Date retour</label>
            <input class="form-control" type="date" name="dateRetour" id=""value="{{$reservation->dateRetour}}">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert m-1 p-0 alert-danger">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button  type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form> 
      </div>
    </div>
  </div>