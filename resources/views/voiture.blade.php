@extends('layouts.head')

@extends('layouts.app')
@section('header',"profile de voitire $car->immatricule")
@section('content')
    @include('components.car.bio')
@endsection
