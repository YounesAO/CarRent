<div class="shadow">
    <div class="d-flex">
        <div class="m-2">
            <h1>marque</h1>
            <p>{{$car->marque->marque}}</p>
            <h1>model :</h1>
            <p>{{$car->model->model}}</p>
            <h1>kilometrage</h1>
            <span class="btn">{{$car->kilometrage}}km</span>
        </div>
        <div class="m-2">
            <img class="imgCar"src="{{ asset("images").'/'}}@php echo$car->image== null ? 'car.png':$car->image @endphp" alt="">
        </div>
    </div>
    <div class="m-2">
        <a href="{{ asset('cars').'/'.$car->id.'/edit' }}" class="btn btn-success">Editer</a>
        <a href="/cars/{{$car->id}}/delete" class="btn btn-danger">delete</a>

    </div>
</div>