@extends('dashboard')
@section('content')
<div class="m-1 home d-flex">
    @foreach ($voitures as $car)
        @include('components.car.card')
    @endforeach
</div>

@endsection
@section('fix')
<div class="d-flex">
    <span>last repare </span>
</div>
@endsection
<style>
    #fix i {
        color: white;
    }
</style>