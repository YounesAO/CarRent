
<!-- Modal -->
<div class="modal fade" id="reservation{{$reservation->idReservation}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Reservation {{$reservation->idReservation}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="" action="/edite/reservation/{{$reservation->idReservation}}" method="post">
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
            <input class="form-control" type="text" name="prix" value="{{$reservation->prix}}" required > 
            <label class="form-label" for="dateDebut">Date debut</label>
            <input class="form-control" type="date" name="dateDebut" id="" value="{{$reservation->dateDebut}}" required>
            <label class="form-label" for="dateRetour">Date retour</label>
            <input class="form-control" type="date" name="dateRetour" id=""value="{{$reservation->dateRetour}}" required>
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
          <button  type="submit" id="submit" class="btn btn-primary" disabled>Modifier</button>
        </div>
    </form> 
    

      </div>
    </div>
  </div>
  <!-- Modal de paiement -->
<div class="modal fade" id="paiement{{$reservation->idReservation}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter un paiement à la reservation : {{$reservation->idReservation}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="" action="/add/paiement/{{$reservation->idReservation}}" method="post">
        <div class="modal-body">
            @include('components.reservation.paiement')
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button  type="submit"  class="btn btn-primary" >Envoyer</button>
        </div>
    </form> 
    

      </div>
    </div>
  </div>
  <!-- Modal de modification paiement -->
<div class="modal fade" id="paiementedit{{$reservation->idReservation}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3  class="modal-title fs-5" id="staticBackdropLabel">Editer le paiement de la reservation : {{$reservation->idReservation}}</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="" action="/edite/paiement/{{$reservation->paiement->idPaiement}}" method="post">
      <div class="modal-body">
        @csrf
        <input type="hidden" name="idReservation" value="{{$reservation->idReservation}}">
        <label  class="form-label" for="datePaiement">Date de paiement</label>
        <input class="form-control" type="date" name="datePaiement" value="{{$reservation->paiement->datePaiement}}" required>
        <label class="form-label" for="montant">Montant</label>
        <input class="form-control" type="text" name="montant" value="{{$reservation->montant}}" required>
        <input class="form-label m-1 Cheque" type="checkbox" name="Cheque" 
        @if ($reservation->paiement->idCheque!=null)
        checked
        @endif
        >
        <label class="form-label " for="Cheque">Payer par Chèque</label>
        <div class="hide">
            <label class="form-label" for="dateCheque">Date de Chèque</label>
            <input class="form-control" type="date" name="dateCheque" value="@if ($reservation->paiement->idCheque!=null){{$reservation->paiement->cheque->dateCheque}}@endif">
        
        </div>              @if ($errors->any())
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button  type="submit"  class="btn btn-primary" >Envoyer</button>
      </div>
  </form> 
  
  
    </div>
  </div>
  </div>