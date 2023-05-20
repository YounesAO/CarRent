<form class="col-11 col-md-9"action="" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value ='@yield('idCar')'>
    
   <div class="container m-2 w-9 d-flex">
        <div class="container-fluid">
            <label class="form-label" for="kilometrage">Kilometrage</label>
            <input class="form-control" type="text" name="kilometrage" id="" value="@yield('kilometrage')" required>
            
            <label class="form-label" for="immatricule">Immatriculation</label>
            <input class="form-control" type="text" name="immatricule" id="" value="@yield('immatricule')" required>
            
            <label class="form-label" for="marque">Marque</label>
            <input class ="form-control"id="marque" name="marque" value="@yield('marque')" list="marques" required>
            
                <datalist id="marques">
                    @foreach($marque as $m)
                    <option value="{{$m->marque}}"></option>
                    @endforeach
                </datalist>
            
            <label class="form-label" for="model">Modèle de voiture</label>
            <input class ="form-control" id="model" name="model" value="@yield('model')" list="models" required>

                <datalist id="models">
                    
                </datalist>
            <label class="form-label" for="anneeModel">Année de modèle</label>
            <input class="form-control" id="anneeModel" type="number" min="1900" max="2099" step="1" name="anneeModel" id="" value="@yield('anneeModel')" required>

            <label class="form-label" for="dateDachat">Date d'achat</label>
            <input class="form-control" type="date" name="dateDachat" id="" value="@yield('dateDachat')" required>
            
        </div>
        <div class="container-fluid ">
            <label class="form-label" for="carburant">Carburant </label>
            <select class="form-control" name="carburant" id="" value="@yield('carburant')">
                <option value="Diesel">Diesel</option>
                <option value="Essence">Essence</option>
                <option value="Hybride">Hybride</option>
                <option value="Electrical">Electrical</option>

            </select>

          
            <label class="form-label" for="nbportest">Nombre des portes</label>
            <input class="form-control" type="number" name="nbportes" id="" value="@yield('nbportes')" required>
            
            <label class="form-label" for="nbPlaces">Nombre des places</label>
            <input class="form-control" type="number" name="nbPlaces" id="" value="@yield('nbPlaces')" required>
            
                <div class=" d-flex flex-column-reverse daitails">
                    <div class=" ">
                        <input class="form-check-input" class="form-check-input" type="checkbox" name="FWD" id=""  @yield('FWD')>
                        <label class="form-label" for="FWD">4x4 (4WD)</label>
                        <input class="form-check-input" type="checkbox" name="AC" id="" @yield('AC')>
                        <label class="form-label" for="AC">Climatisation (AC)</label>

                    </div>
                    <div>
                        <input class="form-check-input" type="checkbox" name="auto" id="" @yield('auto')>
                        <label class="form-label" for="auto">Boite Automatique</label>
                    </div>
                </div>

            <label class="form-label" for="image">Image</label>
            <input class="form-control" type="file"  name="image" value="@yield('image')"id="" >
            
        
        </div>
</div>
@if($errors->any())
    <div id="error" class="form-text text-danger">error d'ajout des données </div>
@endif
    <CENter>   
        <input class="btn btn-success m-2" type="submit" value="Enregister">
        <input class="btn btn-dark m-2" type="reset" value="Annuler">
        <a class="btn btn-danger m-2" href="{{ asset('dashboard/') }}">Retouner</a>
    </CENter>   
</form>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        console.log('hi')

        $('#marque').change(function() {
            var selectedMarque = $(this).val();
            console.log(selectedMarque)


    $.ajax({
      url: '/get-model',
      method: 'GET',
      data: { marque: selectedMarque },
      success: function(data) {
        var datalist = $('#models');
        datalist.empty(); // Clear existing options
        $.each(data, function(index, item) {
          $('<option>').attr('value', item.model).appendTo(datalist);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
      }
    });
  });
});
</script>