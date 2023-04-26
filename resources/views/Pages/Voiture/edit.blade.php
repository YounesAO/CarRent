@include('layouts.head')

@section('title','edite une voiture page')
@extends('layouts.app')
@section('header','modifier une voiture')
@section('content')
    @include('components.CaR.editForm')
@endsection
