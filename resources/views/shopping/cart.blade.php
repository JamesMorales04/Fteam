@extends('layouts.app')
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.shoppingCart') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.shoppingCart') }}</p>
    </div>
@endsection
@section('content')
    {{ Breadcrumbs::render('shoppingcart') }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ __('messages.shoppingCart') }}</div>
                    <div class="card-body">
                        <ul id="errors">
                            @foreach ($data['foods'] as $food)
                                <div>
                                    {{ __('messages.amount') }}: {{ $food[1] }} - {{ $food[0]->getName() }} :
                                    {{ $food[0]->getPrice() }}
                                    {{ __('messages.foodType') }} {{ $food[2] ? __('messages.yes') : __('messages.no') }}
                                </div>
                            @endforeach
                        </ul>
                        <br />
                        {{ __('messages.total') }}: {{ $data['total'] }}<br /><br />
                        <div class="row">
                            <div class="col-auto">
                                @if ($data['foods'])
                                    <a method="GET" href="{{ route('shop.buy') }}">
                                        <button class="btn btn-outline-primary"> {{ __('messages.buy') }} </button>
                                    </a>
                                @else
                                    <button class="btn outline-primary"> {{ __('messages.buy') }} </button>
                                @endif
                            </div>

                            <div class="col-auto">
                                <a href="{{ route('shop.removeAll') }}">
                                    <button class="btn btn-outline-danger"> {{ __('messages.removeAll') }} </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
@endsection
