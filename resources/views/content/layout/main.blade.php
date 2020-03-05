<html>
    <head>
        <title>@yield("title") | Erthru</title>
        <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}">
        <script src="{{ url('/assets/js/jquery.js') }}"></script>
        <script src="{{ url('/assets/js/popper.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
    </head>

    <body>
        @include("content.layout.top")
        
        <br />

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("content.layout.side")
                </div>

                <div class="col-md-9">
                   @yield("content")
                </div>
            </div>
        </div>
    </body>
</html>