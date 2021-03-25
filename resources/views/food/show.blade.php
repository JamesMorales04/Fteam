@extends('layouts.app')

@section('title', $data['title'])

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ $data['title'] }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ $data['title'] }}</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $data['food']->getName() }}</div>

                    <div class="card-body">
                        <b>{{ __('messages.id') }}:</b> {{ $data['food']->getId() }}<br />
                        <b>{{ __('messages.name') }}:</b> {{ $data['food']->getName() }}<br />
                        <b>{{ __('messages.description') }}:</b> {{ $data['food']->getDescription() }} <br />
                        <b>{{ __('messages.status') }}:</b>
                        {{ $data['food']->getAvailability() ? 'Available' : 'Not available' }}<br />
                        <b>{{ __('messages.recipe') }}:</b> {{ $data['food']->getRecipe() }}<br />

                        <b>{{ __('messages.price') }}:</b> {{ $data['food']->getPrice() }}<br />

                        <div class="row">
                            <div class="col-auto">
                                <a method="GET" href="{{ route('food.update', ['id' => $data['food']->getId()]) }}">
                                    <button class="btn btn-outline-primary"> {{ __('messages.edit') }} </button>
                                </a>
                            </div>

                            <div class="col-auto">
                                <form method="POST"
                                    action="{{ route('food.delete', ['id' => $data['food']->getId()]) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-outline-danger"> {{ __('messages.delete') }} </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
