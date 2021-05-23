@extends('layouts.app')

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('general.addBalance') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('general.addBalance') }} </p>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('general.addBalance') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.addBalance') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('general.addBalance') }}</label>
                                <div class="col-8">
                                    <input type="number" class="form-control" min="0.1" placeholder="0000" name="balance" step="0.1"
                                        value="{{ old('price') }}" />
                                </div>
                            </div>

                            <div class="form-group row col-md-auto">
                                <input class="btn btn-primary" type="submit" value="{{ __('general.add') }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <br />
@endsection
