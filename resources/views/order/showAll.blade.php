@extends('layouts.app')

@section('title', __('messages.orders'))
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.orders') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.orders') }} </p>
    </div>
@endsection
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (sizeOf($orders['orders']) > 0)
                    @foreach ($orders['orders'] as $order)
                        <div class="card">

                            <strong>
                                <div class="card-header">{{ __('messages.order') }} {{ $order->getId() }}</div>
                            </strong>

                            <div class="card-body">

                                @foreach ($orders[$order->getId()] as $food)
                                    <strong>{{ $food->getFoodName() }}:</strong> {{ $food->getAmount() }}</b><br />
                                @endforeach
                                <label class="col-ld-8 "><strong>{{ __('messages.total') }}</strong>:
                                    {{ $order->getTotal() }}</label><br />
                                <label class="col-ld-8 "><strong>{{ __('messages.creationDate') }}</strong>:
                                    {{ $order->getRegisterDate() }}</label><br />
                            </div>
                        </div><br />


                    @endforeach
                @else

                    <div class="card">

                        <div class="card-header">{{ __('messages.orders') }}</div>

                        <div class="card-body">

                            <label class="col-ld-8 ">{{ __('messages.noOrders') }}</label><br />
                            <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"
                                class="btn btn-outline-primary">{{ __('messages.return') }}</a>



                        </div>
                    </div>

                @endif



            </div>

        </div>

    </div>

@endsection
