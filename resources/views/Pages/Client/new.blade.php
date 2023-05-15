@php $title = "Ajouter un nouveau Client" @endphp
@extends('dashboard')
@section('header')
<div class="m-3">
    <h4>Ajouter un nouveau Client</h4>
</div>
@endsection
@section('content')
@include('components.client.add')
@endsection