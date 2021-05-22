@extends('layouts.app')

@section('title', 'Ingredients')

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('ingredients.ingredients') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('ingredients.ingredients') }}</p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('showingredients') }}
    <div class="container">
        <h1>{{ __('ingredients.ingredients') }}</h1>

        <ul>
            @foreach ($data['ingredients'] as $ingredients)
                @if ($ingredients->getDeleted() === 0)   
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col align-self-start"><strong>{{ __('ingredients.productName') }}:</strong>
                                    {{ $ingredients->getName() }} </div>
                                <div class="col align-self-start"><strong>{{ __('ingredients.productAmount') }}:</strong>
                                    {{ $ingredients->getAmount() }} </div>
                                <div class="col align-self-end">
                                    <a class="float-right"
                                        href="{{ route('ingredients.show') }}/{{ $ingredients->getId() }}">
                                        <button class="btn btn-outline-primary">{{ __('general.view') }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
