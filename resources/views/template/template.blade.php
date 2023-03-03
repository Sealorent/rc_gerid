<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admindek | Admin </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Head URl -->
    @include('template.partials.head')
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.html">
                            <img class="img-fluid" src="{{ asset('assets/images/logo.png') }}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-text search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-text search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                        @if (Auth()->user()->avatar != null)
                                        <img class="img-fluid" src="{{ Auth()->user()->avatar }}" alt="Theme-Logo" />
                                        @else
                                        <img src="{{ asset('assets/images/avatar-4.jpg') }}" class="img-radius"
                                            alt="User-Profile-Image">
                                        @endif
                                        <span>{{ Auth()->user()->name }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile

                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages

                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen

                                            </a>
                                        </li>
                                        @if ( Auth()->user()->role != 'admin')
                                        <li onclick="document.getElementById('myform').submit()">
                                            <form action="{{ route('logoutUser') }}" id="myform" method="POST">
                                                @csrf
                                                <a>
                                                    <i class="feather icon-log-out"></i>
                                                    Logout
                                                </a>
                                            </form>
                                        </li>
                                        @else
                                        <li onclick="document.getElementById('myform').submit()">
                                            <form action="{{ route('logout') }}" id="myform" method="POST">
                                                @csrf
                                                <a>
                                                    <i class="feather icon-log-out"></i>
                                                    Logout
                                                </a>
                                            </form>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    @include('template.partials.sidebar')
                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        @yield('content')

                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>

    @include('template.partials.script')
</body>

</html>
