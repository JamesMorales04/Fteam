@extends('layouts.app')

@section('title', $data['title'])

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('ingredients.createIngredient') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('ingredients.createIngredient') }}</p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('createingredient') }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('ingredients.createIngredient') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('ingredients.save') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('general.name') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="Mango"
                                        name="name" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('ingredients.productPrice') }}</label>
                                <div class="col-8">
                                    <input type="number" class="form-control" placeholder="10" name="price"
                                        value="{{ old('price') }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('general.amount') }}</label>
                                <div class="col-8">
                                    <input type="number" class="form-control" placeholder="10" name="amount"
                                        value="{{ old('amount') }}" />
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <center><input class="btn btn-outline-primary" type="submit"
                                        value="{{ __('general.send') }}" /></center>
                            </div>
                            <br \>
                        </form>

                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
