<form class=""action="" method="post">
    @csrf
    <input type="hidden" name="id" value ='@yield('idCar')'>
    
   <div class="container m-2 w-9 d-flex">
        <div class="container-fluid">
            <label class="form-label" for="kilometrage">Kilometrage</label>
            <input class="form-control" type="text" name="kilometrage" id="" value="@yield('kilometrage')" required>
            
            <label class="form-label" for="immatricule">Immatriculation</label>
            <input class="form-control" type="text" name="immatricule" id="" value="@yield('immatricule')" required>
            
            <label class="form-label" for="marque">Marque</label>
            <input class ="form-control" name="marque" value="@yield('marque')" list="marques" required>
            
                <datalist id="marques">
                    <option value="Dacia"></option>
                </datalist>
            
            <label class="form-label" for="dateDachat">Date d'achat</label>
            <input class="form-control" type="date" name="dateDachat" id="" value="@yield('dateDachat')" required>
            
        </div>
        <div class="container-fluid ">
            <label class="form-label" for="nbportest">Nombre des portes</label>
            <input class="form-control" type="number" name="nbportes" id="" value="@yield('nbportes')" required>
            
            <label class="form-label" for="nbPlaces">Nombre des places</label>
            <input class="form-control" type="number" name="nbPlaces" id="" value="@yield('nbPlaces')" required>
            
            <label class="form-label" for="image">Image</label>
            <input class="form-control" type="file"  name="image" value="@yield('image')"id="" >
            
        
        </div>
   </div>
   <div id="error" class="form-text text-danger">error d'ajout des données </div>
<CENter>   <input class="btn btn-success m-2" type="submit" value="Enregister">
</CENter>   
</form>