
@include('layouts.head')
@extends('layouts.app')
@section('content')

    <div class="login-container">
        
        <div>
            @foreach ($users as $user)
                <a class="btn btn-warning w" href="{{ asset('welcome') }}">
                    <p>{{$user->prenomUtilisateur." ".$user->nomUtilisateur }}  </p>
                </a> 
            @endforeach
        </div>
    </div>
@endsection
