<html>
    <head>
        <title>@yield("title") | Erthru</title>

        <link rel="stylesheet" href="{{ url('/assets/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/font-awesome/css/fa.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/own/css/style.css') }}">

        <script src="{{ url('/assets/bootstrap/js/jquery.js') }}"></script>
        <script src="{{ url('/assets/bootstrap/js/popper.js') }}"></script>
        <script src="{{ url('/assets/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/font-awesome/js/fa.js') }}"></script>
        <script src="{{ url('assets/masonry/js/masonry.pkgd.js') }}"></script>
    </head>

    <body style="background-color: #ebebeb">
        @include("content.layout.top")
        
        <br />

        @yield("content")

        <br />

        @include("content.layout.bottom")
    </body>
</html>