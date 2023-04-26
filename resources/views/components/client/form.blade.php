<form class = "" action="/add/client" method="post">
    @csrf
    <input type="hidden" name="id" value ='@yield('idCar')'>
    
   <div class="container m-2 w-9 d-flex">
        <div class="container-fluid">
            @csrf
            @foreach($req->all() as $key => $data)
            <input type="hidden" name="req [{{$key}}]" value="{{$data}}">
            @endforeach
            <label class="form-label" for="nom">Nom Client</label>
            <input class="form-control" type="text" name="nom" id=""  required>
            
            <label class="form-label" for="prenom">Prénom</label>
            <input class="form-control" type="text" name="prenom" id="" required>
            
            <label class="form-label" for="cin">CIN</label>
            <input class ="form-control" type="text" name="cin" value="{{$req->cin}}" disabled>

            <label class="form-label" for="dateNaiss">Date de naissance</label>
            <input class="form-control" type="date" name="dateNaiss" id="" value="" required>
            <label class="form-label" for="adresseClient">Adresse de Client</label>
            <textarea class="form-control" name="adresseClient" id="" cols="30" rows="4" >
            </textarea>
            
        </div>
        <div class="container-fluid ">
            <label class="form-label" for="numPermis">Numéro de permet</label>
            <input class="form-control" type="text" name="numPermis" id="" value="" required>
            
            <label class="form-label" for="datePermis">Date de Permis</label>
            <input class="form-control" type="date" name="datePermis" id="" value="" required>
            
            <label class="form-label" for="villePermis">ville d'obtention du Permis</label>
            <input class="form-control" type="text" name="villePermis" id="" value="" required>

            <label class="form-label" for="nationalite">Nationalité</label>
            <input class ="form-control" type="text" name="nationalite" value="" >
            
            <label class="form-label" for="imagePermis">photo du Permis de conduite </label>
            <input class="form-control" type="file"  name="imagePermis" value=""id="" >

            <label class="form-label" for="image">photo de la carte d'identite nationale</label>
            <input class="form-control" type="file"  name="image" value=""id="" >
            
            
            
        
        </div>
   </div>
   @if($errors->any())
        <div id="error" class="form-text text-danger">error d'ajout des données </div>
   @endif
    <CENter>   
        <input class="btn btn-success m-2" type="submit" value="Enregister">
        <input class="btn btn-dark m-2" type="reset" value="Annuler">
        <a class="btn btn-danger m-2" href="./">Retouner</a>
    </CENter>   
</form>