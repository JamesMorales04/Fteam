@extends('layouts.app')

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.home') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.home') }}</p>
    </div>
@endsection

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ __('messages.subMenu') }}
            </h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <a class="btn btn-outline-primary" href="{{ route('food.showAll') }}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                        </div>
                        <img class="img-fluid" src="{{ asset('/img/portfolio/menu.png') }}" alt="" />
                    </a>
                </div>
                @guest
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                            </div>
                            <img class="img-fluid" src="{{ asset('/img/portfolio/perfil.png') }}" alt="" />
                        </a>
                    </div>
                @else
                    <!-- Portfolio Item 2-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a class="btn btn-outline-primary" href="{{ route('user.show', ['id' => Auth::id()]) }}">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                            </div>
                            <img class="img-fluid" src="{{ asset('/img/portfolio/perfil.png') }}" alt="" />
                        </a>
                    </div>
                @endguest

                <!-- Portfolio Item 3-->
                <div class="col-md-6 col-lg-4 mb-5">
                    <a class="btn btn-outline-primary" href="{{ route('shop.cart') }}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                        </div>
                        <img class="img-fluid" src="{{ asset('/img/portfolio/carrito.png') }}" alt="" />
                    </a>
                </div>
                <!-- Portfolio Item 4-->
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <a class="btn btn-outline-primary" href="{{ route('food.topThree') }}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                        </div>
                        <img class="img-fluid" src="{{ asset('/img/portfolio/podio.png') }}" alt="" />
                    </a>
                </div>
                <!-- Portfolio Item 5-->
                <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                    <a class="btn btn-outline-primary" href="https://github.com/JamesMorales04/Fteam.git">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                        </div>
                        <img class="img-fluid" src="{{ asset('/img/portfolio/Logo3.png') }}" alt="" />
                    </a>
                </div>
                <!-- Portfolio Item 6-->
                <div class="col-md-6 col-lg-4">
                    <a class="btn btn-outline-primary" href="{{ route('order.showAll') }}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">

                        </div>
                        <img class="img-fluid" src="{{ asset('/img/portfolio/factura.png') }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">{{ __('messages.about') }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">

                <p class="lead">{{ __('messages.descriptionApp') }}</p>

            </div>

        </div>
    </section>

@endsection
