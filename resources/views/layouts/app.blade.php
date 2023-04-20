
<body>
    @include('components.UI.nav')
    <h1>@yield('header')</h1>
    <div class=" content d-flex  justify-content-center shadow">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>