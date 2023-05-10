<div class="d-flex flex-column  col-11 jusity-content-center reservation-about">
    <div class="header">
        <section class="car" onclick="window.location.href ='{{ route('voiture', ['id'=>$reservation->voiture->id]) }}'"> 
             <div class="icon">
                <i class="fa-solid fa-car-tunnel"></i>
            </div>
            <div>
           
            <span class='bold'>{{$reservation->voiture->marque->marque}}</span>
            <span>{{$reservation->voiture->model->model}}</span>
        </div>
        </section>
        <section class="client" onclick="window.location.href ='{{ route('client', ['client'=>$reservation->Client->idClient]) }}'">
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div>    
                <span class='bold'>{{$reservation->client->nomClient}} {{$reservation->client->prenomClient}}</span>             
                <span>{{$reservation->client->CIN}}</span>
            </div>
        </section>
        <section class="stat">
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
    <section class="section-info">
        <div class="depart">
            <span>Depart :</span>
            <span class='bold number'>{{$reservation->dateDebut}}</span>
        </div>
        
        <div class="arrivee">
            <span>Arrivee :</span>
            <span class='bold number'>{{$reservation->dateRetour}}</span>
        </div>  
        <div class="duree">
            <span>Durée :</span>
            <span class='bold number'>{{$reservation->duree}} <span>jours</span></span>
        </div>
        <div class="montant">
            <span>Montant :</span>
            <span class='bold number'>{{$reservation->montant}}</span>
        </div>
    </section>
    <div class="buttons">
        <button data-bs-toggle="modal" data-bs-target="#reservation{{$reservation->idReservation}}"class="btn btn-warning m-1">Modifier la reservation</button>
    </div>
    <section>
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
