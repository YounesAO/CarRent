@php $title = 'Modifer les informations de '.$nom = $car->marque->marque ." ".$car->model->model  @endphp
@include('layouts.head')

@extends('layouts.app')
@section('header','modifier une voiture')
@section('content')
    @include('components.CaR.editForm')
@endsection
