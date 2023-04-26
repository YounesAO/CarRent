
@include('layouts.head')
@extends('layouts.app')
@section('bar')
@include('layouts.bar')
@endsection
@section('mt',5)
@section('active-reservation','active')
@section('content')
@include('components.client.form')
@endsection
