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
                        <form role="form" method="POST" action="{{ route('Ingredients.updateSave') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label">
                                    <input type="hidden" class="form-control" name="id" value="{{ $data->getId() }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.productName') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="Enter name" name="name"
                                        value="{{ $data->getName() }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.productPrice') }}</label>
                                <div class="col-8">
                                    <textarea type="number" name="price" class="form-control" spellcheck="true"
                                        value="{{ old('price') }}">{{ $data->getPrice() }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.productAmount') }}</label>
                                <div class="col-8">
                                    <textarea type="number" name="amount" class="form-control" spellcheck="true"
                                        value="{{ old('amount') }}">{{ $data->getAmount() }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.productAvailability') }}</label>
                                <div class="col-8">
                                    @if ($data->getAvailability())
                                        <input type="checkbox" class="col-sm-100" name="availability"
                                            value="{{ old('availability') }}" checked>
                                    @else
                                        <input type="checkbox" class="col-sm-100" name="availability"
                                            value="{{ old('availability') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="col-2">
                                <center><input class="btn btn-outline-primary" type="submit" value="Send" /></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> </br>
@endsection
