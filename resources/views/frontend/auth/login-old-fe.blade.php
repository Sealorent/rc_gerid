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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css"
        integrity="sha512-G/T7HQJXSeNV7mKMXeJKlYNJ0jrs8RsWzYG7rVACye+qrcUhEAYKYzaa+VFy6eFzM2+/JT1Q+eqBbZFSHmJQew=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
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

    <main class="container mt-2 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body bg-light">
                    <h3 class="card-title ">Sign In</h3>
                    <form action="{{ route('login') }}" class="p-4 " method="post">
                        @csrf
                        <div class="row mx-lg-5 mt-2 ">
                            <div class="mb-3 col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Email
                                    address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com" name="email">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleFormControlInput1"
                                    name="password">
                            </div>
                            <div class="col-lg-12">
                                <label for="exampleFormControlInput1" class="form-label "></label>
                                <button type="submit" class="btn btn-primary  col-12 mt-2"> <span>Sign In</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="p-4">
                        <p class="text-center">Belum Memiliki Akun <span> <a
                                    href="{{ route('registerUser') }}">Daftar</a>
                            </span> </p>

                        <p class="text-center">Login Menggunakan akun Lainnya?</p>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <a href="{{ url('auth/google') }}" class="btn btn-outline-primary m-3 ">
                                    <span><i class="fa-brands fa-google "></span></i> <span>Google</span>
                                </a>
                                {{-- <a href="{{ url('auth/google') }}" class="btn btn-outline-primary m-3 ">
                                    <span><i class="fa-brands fa-google "></span></i> <span>Google</span>
                                </a> --}}
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">

                        <a href="{{ url('auth/google') }}" class="btn btn-outline-primary mb-3 ">
                            <span><i class="fa-brands fa-google "></span></i> <span>Google</span>
                        </a>
                        <button type="button" class="btn btn-outline-primary mb-3">
                            <span><i class="fa-brands fa-twitter "></i></span> <span>Twitter</span>
                        </button>
                        <button type="button" class="btn btn-outline-primary mb-3">
                            <span><i class="fa-brands fa-linkedin "></i></span> <span>LinkedIn</span>
                        </button>
                        <a href="{{ route('signIn.BankData') }}" class="btn btn-outline-primary mb-3">
                            <i class="fa-brands fa-snapchat "></i>BankData
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>
    <footer class="blog-footer" style="margin-top: auto">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{ session()->get('success') }}",
            type: "success"
        })
    </script>
    @endif
</body>

</html>
