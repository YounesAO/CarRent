@php $title = " " @endphp

@include('layouts.head')
@php $message =0 @endphp

@foreach($cheques as $c)
@if($c->now)
@php $message++; @endphp

<li class="m-1 p-3">
    <div>le chèque du {{$c->client->nomComplet}} est <a href="/profile/client?client={{$c->client->idClient}}" target="_parent">pret</a></div>
</li>
@endif
@endforeach

@foreach($voitures as $voiture)
@if(count($voiture->entretients)>0)
@php $message++; @endphp

<li class="m-1 p-3">
    <div>
        <img src="{{ asset('images') }}/{{$voiture->image}}" alt="" style="width:50px;">
        <span>{{$voiture->nom}} besoin de {{count($voiture->entretients)}}</span>
    </div>
</li>
@endif
@endforeach
@if($message == 0)
<li class="text-center">
    Aucune notification
</li>
@endif

<style>
    li{
        list-style: none
    }
</style>