
<form class="w-9" action="" method="post">
    @csrf
    <input type="hidden" name="idVoiture" value="{{ $voiture ?? ''}}">
    <label class="form-label" for="cin">CIN de Client :</label>
    <input class="form-control" type="text" name="cin" id="">
    <label class="form-label" for="dateDebut">Date debut</label>
    <input class="form-control" type="date" name="dateDebut" id="">
    <label class="form-label" for="dateRetour">Date retour</label>
    <input class="form-control" type="date" name="dateRetour" id="">
    @if ($errors->any())
   
            @foreach ($errors->all() as $error)
            <div class="alert m-1 p-0 alert-danger">
                <ul>
                <li>{{ $error }}</li>
            </ul>
        </div>
            @endforeach
       
@endif
    <center>
        <input class="btn btn-success m-2" type="submit" value="Suivant">
        <input class="btn btn-dark m-2 " type="reset" value="Vider">
        <a  class="btn btn-danger" href="./">Retouner</a>
    </center>
    
</form> 