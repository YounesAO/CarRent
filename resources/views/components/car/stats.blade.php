<div class='d-flex flex-wrap justify-content-center  col-12 p-3'>
    <div class="box col-11 col-md-6 ">
        <canvas id="Reserve-chart" class="p-3"></canvas>
        <span class="title">Total des reservation</span>
    </div>
    <div class="d-flex flex-column justify-content-around voituresStats  fw">

        <div class="m-1 fw p-3">
            <span class="desc">
                Nombre des reservations
            </span>
            <span class="num reserv" >
                {{$reservations->count()}}
            </span>
        </div>
        <div class="m-1 fw p-3">
            <span class="desc">
                Total revenues
            </span>
            <span class="num" style="color :rgb(30, 156, 47)">
                {{$reservations->pluck('montant')->sum()}}
            </span>
        </div>
        <div class="m-1 fw  p-3">
            <span class="desc">
                    Total charges
                </span>
                <span class="num " style="color :rgb(179, 42, 42)">
                    {{$totalChargeVoiture}}
                </span>
        </div>
        <div class="m-1 fw p-3">
            <span class="desc">
                    Net revenues
                </span>
                <span class="num">
                    {{$reservations->pluck('montant')->sum() - $totalChargeVoiture}}
                </span>
        </div>
    </div>
</div>
<input type="hidden" id="clientReservation" value="{{json_encode($data)}}">