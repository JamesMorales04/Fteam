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
    {{ Breadcrumbs::render('ingredient', $data['product']) }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>{{ $data['product']->getName() }}</strong></div>

                    <div class="card-body">
                        <b>{{ __('ingredients.productID') }}:</b> {{ $data['product']->getId() }}<br />
                        <b>{{ __('ingredients.productName') }}:</b> {{ $data['product']->getName() }}<br />
                        <b>{{ __('ingredients.productPrice') }}:</b> {{ $data['product']->getPrice() }}<br />
                        <b>{{ __('ingredients.productAmount') }}:</b> {{ $data['product']->getAmount() }}<br />
                        @if ($data['product']->getAvailability() == 1)
                            <b>{{ __('ingredients.productAvailability') }}:</b> {{ __('general.yes') }} <br /><br />
                        @else
                            <b>{{ __('ingredients.productAvailability') }}:</b> {{ __('general.no') }} <br /><br />
                        @endif
                        <div>
                            {{-- <input type="submit" class="btn btn-outline-primary"
                                value="{{ __('ingredients.backIngredients') }}"
                                onclick="location='{{ route('ingredients.show') }}'"> --}}
                            <input type="submit" class="btn btn-outline-primary" value="{{ __('general.edit') }}"
                                onclick="location='{{ route('ingredients.update', ['id' => $data['product']->getId()]) }}'">
                            <input type="submit" class="btn btn-outline-danger" value="{{ __('general.delete') }}"
                                onclick="location='{{ route('ingredients.delete', ['id' => $data['product']->getId()]) }}'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
