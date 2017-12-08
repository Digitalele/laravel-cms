
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials._head')
</head>


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
    

   
    

    {{-- Javascripts --}}
    @yield('scripts')

    <script>

        // $(".btn-default").click(function(e) {
    
        //         e.preventDefault();

        //         var submit          = $('#contact-form submit');
        //         //var ajaxResponse    = $('#contact-response');

        //         var name            = $('#email').val();
        //         var email           = $('#subject').val();
        //         var message         = $('#message').val();

        //         $.ajax({
        //             type: 'POST',
        //             url: '/contact',
        //             dataType: 'json',
        //             data: {
        //                 name: name,
        //                 email: email,
        //                 message: message,
        //             },
        //             cache: false,
        //             beforeSend: function(result) {
        //                 $(".btn-default").empty();
        //                 $(".btn-default").append('<i class="fa fa-cog fa-spin"></i> Wait...');
        //             },
        //             success: function(result) {
        //                 if(result.sendstatus == 1) {
        //                     ajaxResponse.html(result.msg);
        //                     $("#contact-form").fadeOut(500);
        //                 } else {
        //                     ajaxResponse.html(result.msg);
        //                 }
        //             }
        //         });
        
        // });
    </script>

</body>
</html>