@extends('layouts.app')

@section('title', $data['title'])

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.create') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.create') }}</p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('messages.createIngredient') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('Ingredients.save') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.name') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="Enter the name of the ingredient"
                                        name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.productPrice') }}</label>
                                <div class="col-8">
                                    <input type="number" class="form-control" placeholder="Enter the price" name="price"
                                        value="{{ old('price') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.amount') }}</label>
                                <div class="col-8">
                                    <input type="number" class="form-control" placeholder="Enter amount" name="amount"
                                        value="{{ old('amount') }}" />
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <center><input class="btn btn-outline-primary" type="submit"
                                        value="{{ __('messages.send') }}" /></center>
                            </div>
                            <br \>
                        </form>
                        <div class="col-md-auto">
                            <center><input type="submit" class="btn btn-outline-danger"
                                    value="{{ __('messages.backHome') }}"
                                    onclick="location='{{ route('home.index') }}'"></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
