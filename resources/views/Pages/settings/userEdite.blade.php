@php $title = "Parametres du compte"@endphp
@extends('dashboard')
@section('header')
<div class="m-2 p-3">
    <h2>
        Information de votre compte
    </h2>
</div>
@endsection
@section('content')
<div class="d-flex justify-content-center fw align-items-center">
    <div class="col-9 p-3 m-2">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post">
            @csrf
            <label class='form-label m-1' for="nomUtilisateur"  >Nom :</label>
            <input class="form-control" name ="nomUtilisateur" type="text" value="{{$user->nomUtilisateur}}" required>
            <label class='form-label m-1' for="prenomUtilisateur">Prenom :</label>
            <input class="form-control" name ="prenomUtilisateur" type="text" value="{{$user->prenomUtilisateur}}" required>
            <label class='form-label m-1' for="email">Email :</label>
            <input class="form-control" name="email"type="text" value="{{$user->email}}" required>
            <a id='resetPw' class=" m-1 btn btn-primary" >Modifier le mot de passe</a>
            <div id="password-reset">
                <label class='form-label m-1' for="password">Mot de passe</label>
                <input class="form-control" name="password"type="password">
                <label class='form-label m-1'>Confirmer le mot de passe</label>
                <input class="form-control" name="repassword"type="password">
            </div>
            <input class="btn btn-success m-1" type="submit" value="Modifier">
        </form>
    </div>
</div>
<script>
    $("#password-reset").hide();
    $("#resetPw").click(function() {
        $("#password-reset").show()
        $("#resetPw").hide();
    });
</script>
@endsection