@include('includes/head')
@include('includes/header')
@include('includes/footer')
@include('includes/toTop')
@include('includes/alertMessage')
@include('includes/scripts')


@yield('head')

<body>
@yield('header')

@yield('alert_message')

@yield('content')

@if(Route::is('login') || Route::is('home') || Route::is('register'))
    @yield('footer_short')
@else
    @yield('footer_long')
@endif

@yield('to_top')


@yield('scripts')
</body>
</html>
