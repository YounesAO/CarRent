
@section('kilometrage',$car->kilometrage)
@section('immatricule',$car->immatricule)
@section('dateDachat',$car->dateDachat)
@section('nbportes',$car->nbportes)
@section('nbPlaces',$car->nbPlaces)
@section('idCar',$car->id)
@section('carburant',$car->carburant)
@if($car->FWD)
@section('FWD','checked')
@endif
@if($car->AC)
@section('AC','checked')
@endif

@if($car->auto)
@section('auto','checked')
@endif

@include('components.car.addform')
<script>
    $('#marque').val('{{ $car->marque->marque }}')
    $('#model').val('{{ $car->model->model }}')
    $('#anneeModel').val('{{ $car->model->annee }}')
</script>

    @if($car->FWD==1)
        <script>
        $('#FWD)').prop( "checked", true );
        </script>
    @endif
    @if($car->AC==1)
        <script>
        $('#AC)').prop( "checked", true );
        </script>
    @endif
    @if($car->auto==1)
        <script>
        $('#auto)').prop( "checked", true );
        </script>
    @endif
