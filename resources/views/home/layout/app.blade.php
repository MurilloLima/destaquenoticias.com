<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Destaque notícias - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('home/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">
    {{-- Icon --}}
    <link rel="icon" type="image/png" href="{{ asset('home/img/icon.png') }}" />
    {{-- tinymce --}}

</head>

<body>
    @include('home.layout.nav')

    @yield('content')

    @include('home.layout.footer')
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('home/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('home/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('home/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('home/assets/js/main.js') }}"></script>
    {{-- checkbox --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('input.checkgroup').click(function() {
                if ($(this).is(":checked")) {
                    $('input.checkgroup').attr('disabled', true);
                    $(this).removeAttr('disabled');
                } else {
                    $('input.checkgroup').removeAttr('disabled');
                }
            })
        })
    </script>
</body>

</html>
