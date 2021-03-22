@extends('layouts.app')

@section('title', $data['title'])

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ $data['product']->getName() }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ $data['product']->getName() }}</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ $data['product']->getName() }}</strong></div>

                    <div class="card-body">
                        <b>{{ __('messages.productID') }}:</b> {{ $data['product']->getId() }}<br />
                        <b>{{ __('messages.productName') }}:</b> {{ $data['product']->getName() }}<br />
                        <b>{{ __('messages.productPrice') }}:</b> {{ $data['product']->getPrice() }}<br />
                        <b>{{ __('messages.productAmount') }}:</b> {{ $data['product']->getAmount() }}<br />
                        @if ($data['product']->getAvailability() == 1)
                            <b>{{ __('messages.productAvailability') }}:</b> {{ __('messages.yes') }} <br /><br />
                        @else
                            <b>{{ __('messages.productAvailability') }}:</b> {{ __('messages.no') }} <br /><br />
                        @endif
                        <center>
                            <input type="submit" class="btn btn-outline-success"
                                value="{{ __('messages.backIngredients') }}"
                                onclick="location='{{ route('Ingredients.show') }}'">
                            <input type="submit" class="btn btn-outline-success" value="{{ __('messages.edit') }}"
                                onclick="location='{{ route('Ingredients.update', ['id' => $data['product']->getId()]) }}'">
                            <input type="submit" class="btn btn-outline-danger" value="{{ __('messages.delete') }}"
                                onclick="location='{{ route('Ingredients.delete', ['id' => $data['product']->getId()]) }}'">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
