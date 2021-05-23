<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title','Home Page')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />}
    <link href="{{ asset('/css/custom-styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ route('home.index') }}">{{ __('general.home') }}</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('food.showAll') }}">{{ __('general.foodMenu') }}</a>
                        </li>

                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('login') }}">{{ __('general.login') }}</a>
                        </li>

                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('register') }}">{{ __('general.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('food.showAll') }}">{{ __('general.foodMenu') }}</a>
                        </li>

                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('shop.cart') }}">{{ __('general.shoppingCart') }}</a>
                        </li>

                        @if (Auth::user()->getRole() === 'Administrador')
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                    href="{{ route('admin.panel') }}">{{ __('admin.adminPanel') }}</a>
                            </li>
                        @endif


                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('user.show', ['id' => Auth::id()]) }}">{{ __('user.profile') }}</a>
                        </li>

                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('general.logout') }}</a>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        @yield('header')
    </header>

    @yield('content')


    <!-- Copyright Section-->
    <br>
    <br>
    <br>
    <div class="copyright py-4 text-center text-white fixed-bottom">
        <div class="container"><small>Copyright © Fteam 2021</small></div>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('/js/scripts.js') }}"></script>
</body>

</html>
