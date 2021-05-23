@extends('layouts.app')


@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('food.menu') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('food.menu') }}</p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('showallfood') }}
    <div class="container">
        @include('util.message')
        <div class="row">
            <div class="col align-self-start">
                <h1>{{ __('food.menu') }}</h1>
            </div>


        </div>
        <input style="align-self: left" type="submit" class="btn btn-outline-primary"
            value="{{ __('food.topThree') }}" onclick="location='{{ route('food.topThree') }}'">

        <ul>
            @foreach ($data as $food)
                <br />
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-start"> {{ $food[1]->getName() }}</div>

                            <div class="col align-self-end">
                                <a class="float-right" href="{{ route('food.show', ['id' => $food[1]->getId()]) }}">
                                    <button class="btn btn-outline-primary">{{ __('general.view') }}</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <b>{{ __('food.description') }}:</b> {{ $food[1]->getDescription() }} <br />
                        <b>{{ __('food.status') }}:</b>
                        {{ $food[1]->getAvailability() ? __('food.available') : __('food.notAvailable') }}
                        <br />
                        <b>{{ __('messages.reviewAvg') }}:</b> {{ $food[0] }}<br />
                        <b>{{ __('general.price') }}:</b> {{ $food[1]->getPrice() }}<br />
                        <div class="row">
                            <div class="col-auto">
                                <div class="row">
                                    <form method="POST" action="{{ route('shop.add') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-8">
                                                <input type="hidden" class="form-control" name="id"
                                                    value="{{ $food[1]->getId() }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-8">
                                                <input type="hidden" class="form-control" name="ingredients"
                                                    value="{{ $food[1]->getIngredients() }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row col-auto">
                                            <div class="col-5">
                                                <input class="form-control col" type="number" name="amount" value="0"
                                                    id="{{ old('amount') }}" min="0">
                                            </div>
                                            <div class="form-group row col-md-auto">
                                                <input class="btn btn-primary" type="submit"
                                                    value="{{ __('cart.AddCart') }}" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="row">
                                    <form method="POST" action="{{ route('shop.addAsIngresients') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-8">
                                                <input type="hidden" class="form-control" name="id"
                                                    value="{{ $food[1]->getId() }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-8">
                                                <input type="hidden" class="form-control" name="ingredients"
                                                    value="{{ $food[1]->getIngredients() }}" />
                                            </div>
                                        </div>

                                        <div class="form-group row col-auto">
                                            <div class="col-5">
                                                <input class="form-control" type="number" name="amount" value="0"
                                                    id="{{ old('amount') }}" min="0">
                                            </div>
                                            <div class="form-group row col-md-auto">
                                                <input class="btn btn-primary" type="submit"
                                                    value="{{ __('food.askForIngredients') }}" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col align-self-end">
                                <div class="col-auto">
                                    <div class="float-left">
                                        <form class="float-right" method="PUT"
                                            action="{{ route('reviews.create', ['id' => $food[1]->getId()]) }}">
                                            @csrf @method('PUT')
                                            <button class="btn btn-outline-primary">
                                                {{ __('messages.createReviews') }}</button>
                                        </form>
                                    </div>

                                    <a class="float-right"
                                        href="{{ route('reviews.show', ['id' => $food[1]->getId()]) }}">
                                        <button
                                            class="btn btn-outline-primary">{{ __('messages.seeReviews') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
