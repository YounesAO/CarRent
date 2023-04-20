
@include('layouts.head')
@extends('layouts.app')
@section('content')

    <div class="login-container">
    

        <div>
            @foreach ($users as $user)
                <p>°{{$user}}</p>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')
@endsection
