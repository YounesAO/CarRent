<div class="d-flex flex-column  col-12 jusity-content-center align-items-center reservation-about">
    <div class="header ">
        <section class="car col-11 col-md-4 m-1" onclick="window.location.href ='{{ route('voiture', ['id'=>$reservation->voiture->id]) }}'"> 
             <div class="icon">
                <i class="fa-solid fa-car"></i>
            </div>
            <div>
           
            <span class='bold'>{{$reservation->voiture->marque->marque}}</span>
            <span>{{$reservation->voiture->model->model}}</span>
        </div>
        </section>
        <section class="client col-11 col-md-4 m-1" onclick="window.location.href ='{{ route('client', ['client'=>$reservation->Client->idClient]) }}'">
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div>    
                <span class='bold'>{{$reservation->client->nomClient}} {{$reservation->client->prenomClient}}</span>             
                <span>{{$reservation->client->CIN}}</span>
            </div>
        </section>
        <section class="stat col-11 col-md-3 m-1">
            <div class="icon">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <div>
                <span>Etat</span>
                <span>
                    @if ($reservation->encours)
                    Encours...
                    @else
                    Terminée
                    @endif
                
                </span>
            </div>
        </section>
    </div>
    <section class="section-info col-12">
        <div class="depart col-12 col-sm-6 col-md-3">
            <span>Depart :</span>
            <span class='bold number'>{{$reservation->dateDebut}}</span>
        </div>
        
        <div class="arrivee col-12 col-sm-5 col-md-3">
            <span>Arrivee :</span>
            <span class='bold number'>{{$reservation->dateRetour}}</span>
        </div>  
        <div class="duree col-12 col-sm-6 col-md-2">
            <span>Durée :</span>
            <span class='bold number'>{{$reservation->duree}} <span>jours</span></span>
        </div>
        <div class="montant col-12 col-sm-5 col-md-3">
            <span>Montant :</span>
            <span class='bold number'>{{$reservation->montant}}</span>
        </div>
    </section>
    <div class="buttons col-12 m-2">
        <button data-bs-toggle="modal" data-bs-target="#reservation{{$reservation->idReservation}}"class="btn btn-warning m-1">Modifier la reservation</button>
        <a class="btn btn-danger "href="/delete/reservation/{{$reservation->idReservation}}">Suprimmer</a>
    </div>
    <section class="col-12 m-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Id paiement</th>
                    <th>Date de paiment</th>
                    <th>Montant Payée (DH)</th>
                    <th>method de paiement</th>
                </tr>
            </thead>
            <tbody>
                @if($reservation->paiement!=null)
                <tr>
                    <td>{{$reservation->paiement->idPaiement}}</td>
                    <td>{{$reservation->paiement->datePaiement}}</td>
                    <td>{{$reservation->paiement->montant}}</td>
                    <td>{{($reservation->paiement->idCheque!=null)?'Chèque':'Espèce'}}</td>
                </tr>
                <tfoot>
                    <td  colspan="4" >
                        <button data-bs-toggle="modal" data-bs-target="#paiementedit{{$reservation->idReservation}}" class=" btn btn-warning noshadow  m-1">modifier payement</button>
                    </td>
                </tfoot>
                @else
                <tr>
                    <td  colspan="4" >
                        <button data-bs-toggle="modal" data-bs-target="#paiement{{$reservation->idReservation}}" class=" btn btn-success">ajouter payement</button>
                    </td>
                </tr>
                @endif

            </tbody>
        </table>
    </section>
</div>
@include('components.reservation.modal')
<script>
    document.addEventListener('DOMContentLoaded', function () {
   
    $('.hide').hide();
    $('input').on('input', function() {
            $('#submit').prop('disabled', false);
    });
    $('.Cheque').change(function() {
        if(this.checked) {
        $('.hide').show();
        } else {
        $('.hide').hide();
        }
    });
}, false);
</script>
