
@include('layouts.head')
@extends('layouts.app')
@section('content')

    <div class="login-container">
    

        <div>
            @foreach ($users as $user)
                <div class="btn btn-warning w">
                    <p>{{$user->prenomUtilisateur." ".$user->nomUtilisateur }}</p>
                </div> 
            @endforeach
        </div>
    </div>
@endsection
