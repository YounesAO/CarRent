@extends('layouts.head')
@section('title','Dashboard')
@include('layouts.nav')
<body>
<div class="d-flex">
@include('layouts.sidebar')
<div class=" w-9 content mt-@yield('mt',0) flex  justify-content-center shadow">
    @yield('header')
    @yield('content')

</div>
</div>
@include('layouts.footer')
</body>
</html>