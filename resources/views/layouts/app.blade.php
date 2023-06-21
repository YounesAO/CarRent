
<body>
    @auth
    @include('layouts.nav')
    @endauth
    @yield('header')
    @yield('bar')
    
    <div class=" content mt-@yield('mt',0) d-flex  justify-content-center ">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>