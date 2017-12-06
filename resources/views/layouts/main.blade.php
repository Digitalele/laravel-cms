@include('layouts.partials._head')

<body>
    {{-- Nav --}}
    <header>
        @include('layouts.partials._nav')
    </header>

    {{-- Main content --}}
	@yield('content')

    {{-- Footer --}}
   @include('layouts.partials._footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="/js/bootstrap.min.js"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment-with-locales.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    

    {{-- Javascripts --}}
    @yield('scripts')

</body>
</html>