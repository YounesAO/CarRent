@extends('layouts.head')

@extends('layouts.app')
@php $nom = $car->marque->marque ." ".$car->model->model @endphp
@section('header',$nom)
@section('content')
    @include('components.car.bio')
@endsection
