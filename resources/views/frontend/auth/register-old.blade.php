<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Bank Data</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo-polije-old.png') }}" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{  asset('bower_components/bootstrap/css/bootstrap.min.css') }}">
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
    </style>
    @stack('css')


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <img src="{{ asset('assets/images/logo-polije.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                            viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    {{-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> --}}
                </div>
            </div>
        </header>

    </div>

    <main class="container mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-light">
                    <h5 class="card-title ">Register BankData</h5>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form method="POST" action="{{ route('postRegisterUser') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="exampleFormControlInput1" name="name">
                                        @error('name')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                                        @error('email')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="exampleFormControlInput1" name="password">
                                        @error('password')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="exampleFormControlInput1" class="form-label">Konfirmasi
                                            Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="exampleFormControlInput1" name="password_confirmation">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback message">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-lg btn-primary px-5 mt-3">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="blog-footer" style="margin-top: auto;">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>


    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Custom js -->



</body>

</html>
