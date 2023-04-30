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
                    @foreach($marque as $m)
                    <option value="{{$m->marque}}"></option>
                    @endforeach
                </datalist>
            
            <label class="form-label" for="model">Model de voiture</label>
            <input class ="form-control" name="model" value="@yield('model')" list="model" required>

                <datalist id="models">
                    
                </datalist>
            <label class="form-label" for="anneeModel">Année de model</label>
            <input class="form-control"type="number" min="1900" max="2099" step="1" name="anneeModel" id="" value="@yield('anneeModel')" required>

            <label class="form-label" for="dateDachat">Date d'achat</label>
            <input class="form-control" type="date" name="dateDachat" id="" value="@yield('dateDachat')" required>
            
        </div>
        <div class="container-fluid ">
            <label class="form-label" for="carburant">Nombre des portes</label>
            <select class="form-control" name="carburant" id="">
                <option value="Diesel">Diesel</option>
                <option value="Essence">Essence</option>
                <option value="Hybride">Hybride</option>
                <option value="Electrical">Electrical</option>

            </select>
            <label class="form-label" for="nbportest">Nombre des portes</label>
            <input class="form-control" type="number" name="nbportes" id="" value="@yield('nbportes')" required>
            
            <label class="form-label" for="nbPlaces">Nombre des places</label>
            <input class="form-control" type="number" name="nbPlaces" id="" value="@yield('nbPlaces')" required>
            
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
<script>
    $(document).ready(function() {
        $('#marque').change(function() {
            var selectedMarque = $(this).val();

    $.ajax({
      url: '/get-model',
      method: 'GET',
      data: { marque: selectedMarque },
      success: function(data) {
        var datalist = $('#models');
        datalist.empty(); // Clear existing options
        $.each(data, function(index, item) {
          $('<option>').attr('value', item).appendTo(datalist);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(errorThrown);
      }
    });
  });
});
</script>