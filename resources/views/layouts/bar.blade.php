<div class="m-1 d-flex justify-content-center">
    <ul class="progress_bar m-1 d-flex justify-content-center">
        <li class ="done"><i class="fa-solid fa-car-side"></i> Choisi la voiture</li>
        <li class ="{{isset($req)?"done":"active"}}" ><i class="fa-regular fa-calendar-plus"></i> info Reservation</li>
        <li class="{{isset($req)?"active":""}}"><i class="fa-solid fa-user"></i> Information client</li> 
    </ul>
</div>