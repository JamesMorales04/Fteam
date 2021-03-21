@extends('layouts.app')

@section('title', __('messages.adminPanel'))

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.admin') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.admin') }} </p>
    </div>
@endsection

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            @include('util.message')

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-start"> {{ __('messages.adminPanel') }} </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('messages.showAllUsers') }}</label> </strong><br />
                                    <a method="GET" href="{{ route('user.showAll') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('messages.users') }}</a><br /><br />
                                </div>
                            </div>

                            <br />
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('messages.showAllOrders') }}</label> </strong><br />
                                    <a method="GET" href="{{ route('order.showAll') }}" type="button"
                                        class="btn btn-outline-primary">{{ __('messages.orders') }}</a><br /><br />
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inner">
                                    <strong><label class="col-ld-8 ">{{ __('messages.createFood') }}</label> </strong><br />
                                    <a class="float-right" href="{{ route('food.create')}}">
                                    <button class="btn btn-outline-primary" >{{  __('messages.create')  }}</button>
                                </a>
                                </div>
                            </div>
                        </div><br/>

                        <strong><label class="col-ld-8 ">{{ __('messages.return') }}</label></strong><br />
                        <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"
                            class="btn btn-outline-primary">{{ __('messages.return') }}</a><br /><br />

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
