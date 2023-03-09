<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" href="{{ asset('assets/images/logo-rc_gerid.png') }}" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        footer {
            margin-top: auto;
        }
    </style>
    @stack('css')
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/feather/css/feather.css') }}">

</head>

<body>


    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-6 d-flex justify-content-start " style="margin-left: 2em;">
                <img src="{{ asset('assets/images/logo-unair.png') }}" class="img-fluid"
                    style="height:6em;width:6em; margin-right:1em" alt="">
                <img src="{{ asset('assets/images/logo-rc_gerid_horizontal.png') }}" class="img-fluid" alt=""
                    style="height:6em;">
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center" style="margin-right: 4em;">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('signIn') }}">Sign In</a>
            </div>
        </div>
    </header>

    <div class="bg-light">
        <nav class="">
            <div class="d-flex">
                <div class="col-12 m-3">
                    <form action="{{ route('home.showData') }}" method="get">
                        <div class="input-group align-middle">
                            <div class="input-group-btn search-panel">
                                <select class="form-control" name="req-opt" id="">
                                    <option value="all">All Database</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" style="margin-right: 2em"
                                onchange="this.form.submit()" name="req" placeholder="Search term...">
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <main>
        @yield('content')
    </main>

    <footer class="blog-footer" style="margin-top: auto">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    @stack('js')
    <!-- Custom js -->
    @if (Route::currentRouteName() != 'home.individual-cases')
        <script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script src="{{ asset('assets/pages/data-table/js/data-table-custom.js') }}"></script>
    @endif
    {{-- @include('template.partials.script') --}}
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('.search-panel .dropdown-menu').find('a').click(function(e) {
                e.preventDefault();
                var param = $(this).attr("href").replace("#", "");
                var concept = $(this).text();
                $('.search-panel span#search_concept').text(concept);
                $('.input-group #search_param').val(param);
            });
        });
    </script>


</body>

</html>
