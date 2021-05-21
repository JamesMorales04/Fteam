@extends('layouts.app')

@section('title', __('admin.adminPanel'))

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('admin.admin') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('admin.admin') }} </p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('adminpanel') }}
    <div class="container">

        <div class="row justify-content-center">
            @include('util.message')

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-start"> {{ __('admin.adminPanel') }} </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('user.showAllUsers') }}</label>
                                    </strong><br />
                                    <a method="GET" href="{{ route('admin.showAllUsers') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('user.users') }}</a><br /><br />
                                </div>
                            </div>

                            <br />
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('order.showAllOrders') }}</label>
                                    </strong><br />
                                    <a method="GET" href="{{ route('admin.showAllOrders') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('order.orders') }}</a><br /><br />
                                </div>

                            </div>

                            <br />
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('food.foods') }}</label>
                                    </strong><br />
                                    <a method="GET" href="{{ route('admin.showAllFood') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('general.view') }}</a><br /><br />
                                </div>

                            </div>

                            <br />
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('messages.seeIngredients') }}</label>
                                    </strong><br />
                                    <a method="GET" href="{{ route('ingredients.show') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('general.view') }}</a><br /><br />
                                </div>
                            </div>
                            <br />
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('food.createFood') }}</label>
                                    </strong><br />
                                    <a class="float-right" href="{{ route('food.create') }}">
                                        <button class="btn btn-outline-primary">{{ __('general.create') }}</button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('messages.createIngredients') }}</label>
                                    </strong><br />
                                    <a method="GET" href="{{ route('ingredients.create') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('general.create') }}</a><br /><br />
                                </div>
                            </div>
                        </div><br />

                        {{-- <strong><label class="col-ld-8 ">{{ __('general.return') }}</label></strong><br />
                        <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"
                            class="btn btn-outline-primary">{{ __('general.return') }}</a><br /><br /> --}}

                    </div>
                    
                </div>
                <br>
            </div>

        </div>

    </div>

@endsection
