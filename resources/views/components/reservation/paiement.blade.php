    @csrf
    <label  class="form-label" for="datePaiement">Date de paiement</label>
    <input class="form-control" type="date" name="datePaiement" required>
    <label class="form-label" for="montant">Monatnt</label>
    <input class="form-control" type="text" name="montant" required>
    <input class="form-label m-1 Cheque" type="checkbox" name="Cheque" >
    <label class="form-label " for="Cheque">Payer par Chèque</label>
    <div class="hide">
        <label class="form-label" for="dateCheque">Date de Chèque</label>
        <input class="form-control" type="date" name="dateCheque">
    
    </div>
