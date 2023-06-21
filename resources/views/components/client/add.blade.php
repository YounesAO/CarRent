<form class = "" action="@yield('url','/new/client')" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value ='@yield('idCar')'>
    
   <div class="container m-2 w-9 d-flex">
        <div class="container-fluid">
            @csrf
            
            <label class="form-label" for="nomClient">Nom Client</label>
            <input class="form-control" type="text" name="nomClient" id="" value="@yield('nomClient')" required>
            
            <label class="form-label" for="prenomClient">Prénom</label>
            <input class="form-control" type="text" name="prenomClient" id="" value="@yield('prenomClient')" required>
            
            <label class="form-label" for="CIN">CIN</label>
            <input class ="form-control" type="text" name="CIN" value="@yield('CIN')" >

            <label class="form-label" for="dateNaissance">Date de naissance</label>
            <input class="form-control" type="date" name="dateNaissance" id="" value="@yield('dateNaissance')" required>
            <label class="form-label" for="adresseClient">Adresse de Client</label>
            <textarea class="form-control" name="adresseClient" id="" cols="30" rows="4" >@yield('adresseClient')</textarea>
            
        </div>
        <div class="container-fluid ">
            <label class="form-label" for="numPermis">Numéro de permet</label>
            <input class="form-control" type="text" name="numPermis" id="" value="@yield('numPermis')" required>
            
            <label class="form-label" for="datePermis">Date de Permis</label>
            <input class="form-control" type="date" name="datePermis" id="" value="@yield('datePermis')" required>
            
            <label class="form-label" for="villePermis">ville d'obtention du Permis</label>
            <input class="form-control" type="text" name="villePermis" id="" value="@yield('villePermis')" required>

            <label class="form-label" for="nationalite">Nationalité</label>
            <input class ="form-control" type="text" name="nationalite" value="@yield('nationalite')" >
            
            <label class="form-label" for="photoPermis">photo du Permis de conduite </label>
            

            <input class="form-control" type="file"  name="photoPermis"  >
            <br>
            @if(isset($client->permis->photoPermis))
            <a href="{{ asset('images')}}/@yield('photoPermis') "><img src="{{ asset('images')}}/@yield('photoPermis') " alt="" style="width:100px;"></a><br>
            @endif
            <label class="form-label" for="photoCIN">photo de la carte d'identite nationale</label>
            <input class="form-control" type="file"  name="photoCIN"  >
            @if(isset($client->photoCIN))
            <a href="{{ asset('images')}}/@yield('photoCIN')"><img src="{{ asset('images')}}/@yield('photoCIN')" alt="" style="width:100px;"></a><br>
            @endif
            
        
        </div>
   </div>
   @if($errors->any())
        <div id="error" class="form-text text-danger">error d'ajout des données </div>
   @endif
    <CENter>   
        <input class="btn btn-success m-2" type="submit" value="Enregister">
        <input class="btn btn-dark m-2" type="reset" value="Vider">
        <a class="btn btn-danger m-2" href="/dashboard/client">Retouner</a>
    </CENter>   
</form>