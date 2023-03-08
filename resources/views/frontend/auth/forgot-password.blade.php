<!-- Pre-loader end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lupa Password  {{ env('APP_NAME')}}</title>
    <link rel="icon" href="{{ asset('assets/images/logo-rc_gerid.png') }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />
    <!-- Favicon icon -->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/feather/css/feather.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages.css') }}">
    <style>
        input,h3 {
            font-family: 'Open Sans, sans-serif';
        }
    </style>
</head>

<body themebg-pattern="theme1">
    <!-- Pre-loader start -->
    
    <!-- Pre-loader end -->
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <form class="md-float-material form-material" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="text-center">
                                <img class="img-fluid"  src="{{ asset('assets/images/logo-rc_gerid_horizontal.png') }}" alt="Theme-Logo" />
                        </div>
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-start">Lupa password</h3>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" name="email" class="form-control" required=""
                                        placeholder="masukkan email yang telah terdaftar">
                                    <span class="form-bar"></span>
                                    {{-- <label class="form-label float-label">Your Email Address</label> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-grid">
                                            <button type="submit"
                                                class="btn btn-primary btn-md waves-effect text-center m-b-20">Reset
                                                Password</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-start m-b-0">Terimakasih</p>
                                        <p class="text-inverse text-start">Kembali ke Halaman<a href="{{ route('signIn') }}" class="text-primary"> Login </a></p>
                                    </div>
                                    <div class="col-md-2">
                                         <img class="img-fluid" style="width: 3em; height: 3em;" src="{{ asset('assets/images/logo-rc_gerid.png') }}" alt="Theme-Logo" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <!-- Warning Section Ends -->



    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/popper.js/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- waves js -->
    <script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/modernizr/js/css-scrollbars.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('status'))
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: "{{ session()->get('status') }}",
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = window.location.origin + "/sign-in";
                }
            })
    </script>
    @endif
</body>

</html>
