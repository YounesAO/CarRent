@php $title = "Dashboard - ".$title @endphp
@include('layouts.head')
<body>
    @include('layouts.nav')

<div class="content d-flex">
        @include('layouts.sidebar')
        <div class=" w-9 content mt-@yield('mt',0) shadow">
            @yield('header')
            @yield('content')
        </div>

</div>
</body>
</html>