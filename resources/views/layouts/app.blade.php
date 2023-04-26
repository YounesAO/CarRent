
<body>
    @include('layouts.nav')
    <h3 class="m-1  ">@yield('header')</h3>
    @yield('bar')
    
    <div class=" content mt-@yield('mt',0) d-flex  justify-content-center shadow">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>