<span class="info optionz  box p-2 m-1">
<!-- test four wheel drive-->
@if($car->FWD)
<strong title="4X4" class=" m-1"><i class="fa-solid fa-truck-monster"></i></strong>
@else
<strong title="2X4" class=" m-1"><i class="fa-solid fa-car-side"></i></strong>
@endif
<!-- test A/C -->
@if($car->AC)
<strong title="Climatisation" class=" m-1"><i class="fa-solid fa-snowflake"></i></strong>
@endif
<!-- test Automatic gear-->
@if($car->auto)
<strong title="Boite automatique" class=" m-1"><i class="fa-solid fa-gears"></i></strong>
@else
<strong title="Boite Manuelle" class=" m-1"><i class="fa-solid fa-gear"></i></strong>
@endif
</span>