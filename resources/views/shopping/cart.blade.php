@extends('layouts.app')
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('cart.shoppingCart') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('cart.shoppingCart') }}</p>
    </div>
@endsection
@section('content')
    {{ Breadcrumbs::render('shoppingcart') }}
    <div class="container">
        @include('util.message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ __('cart.shoppingCart') }}</div>
                    <div class="card-body">
                        <ul id="errors">
                            @foreach ($data['foods'] as $food)
                                <div>
                                    {{ __('general.amount') }}: {{ $food[1] }} - {{ $food[0]->getName() }} :
                                    {{ $food[0]->getPrice() }}
                                    {{ __('order.foodType') }} {{ $food[2] ? __('general.yes') : __('general.no') }}

                                    <div class="row">
                                        <form method="POST" action="{{ route('shop.remove') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-8">
                                                    <input type="hidden" class="form-control" name="id"
                                                        value="{{ $food[0]->getId() }}" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-8">
                                                    <input type="hidden" class="form-control" name="ingredients"
                                                        value="{{ $food[2] }}" />
                                                </div>
                                            </div>

                                            <div class="form-group row col-auto">
                                                <div class="col-5">
                                                    <input class="form-control col" type="number" name="amount" value="0"
                                                        id="{{ old('amount') }}" min="0">
                                                </div>
                                                <div class="form-group row col-md-auto">
                                                    <input class="btn btn-outline-danger" type="submit"
                                                        value="{{ __('cart.remove') }}" />
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                
                                </div>
                            @endforeach
                        </ul>
                        <br />
                        {{ __('general.total') }}: {{ $data['total'] }}<br /><br />
                        <div class="row">
                            <div class="col-auto">
                                @if ($data['foods'])
                                    <a method="GET" href="{{ route('shop.buy') }}">
                                        <button class="btn btn-outline-primary"> {{ __('cart.buy') }} </button>
                                    </a>
                                    <a method="GET" href="{{ route('payment') }}" class="btn btn-outline-primary">
                                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                
                                        </div>
                                        <img class="img-fluid" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" width="90" height="90" alt="" />
                                    </a>
                                @else
                                    <button class="btn outline-primary"> {{ __('cart.buy') }} </button>
                                @endif
                            </div>
                            
                            <div class="col-auto">
                                <a href="{{ route('shop.removeAll') }}">
                                    <button class="btn btn-outline-danger"> {{ __('cart.removeAll') }} </button>
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
