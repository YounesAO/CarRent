@extends('layouts.head')

@extends('layouts.app')
@section('header',"profile de voitire $car->id")
@section('content')
    @include('components.car.bio')
@endsection
