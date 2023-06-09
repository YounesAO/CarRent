
<form class="col-11 col-md-4" action="" method="post">
    @csrf
    <input type="hidden" name="idVoiture" value="{{ $voiture ?? ''}}">
    <label class="form-label" for="cin">CIN de Client :</label>
    <input class="form-control" type="text" name="cin" value="@yield('cin')" id="">
    <label class="form-label" for="dateDebut">Date debut</label>
    <input class="form-control" type="date" name="dateDebut" id="">
    <label class="form-label" for="dateRetour">Date retour</label>
    <input class="form-control" type="date" name="dateRetour" id="">
    @if(!isset($voiture))
        <input class="form-control" type="hidden" value="" name="prix" id="">
    @else
        <label class="form-label" for="prix">Prix</label>
        <input class="form-control" type="text" name="prix" id="">
    @endif
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
        <a  class="btn btn-danger" href="{{ asset('cars') }}">Retouner</a>
    </center>
    
</form> 