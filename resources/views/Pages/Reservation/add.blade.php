
@include('layouts.head')
@extends('layouts.app')
@section('bar')
@include('layouts.bar')
@endsection
@section('mt',5)
@section('content')
@include('components.reservation.form')

@endsection
