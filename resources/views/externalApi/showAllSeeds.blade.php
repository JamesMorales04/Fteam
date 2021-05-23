@extends('layouts.app')

@section('title', __('external.otherStores'))
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('external.seeds') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('external.seeds') }} </p>
    </div>
@endsection
@section('content')
    {{ Breadcrumbs::render('otherStores') }}
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (sizeOf($data) > 0)
                    @foreach ($data as $seed)
                        <div class="card">

                            <strong>
                                <div class="card-header">{{ __('external.seed') }}: {{ $seed->name }}</div>
                            </strong>

                            <div class="card-body">

                                <b>{{ __('general.name') }}:</b> {{ $seed->name }}<br />
                                <b>{{ __('external.seller') }}:</b> {{ $seed->seller }}<br />
                                <b>{{ __('external.stock') }}:</b> {{ $seed->stock }}<br />
                                <b>{{ __('general.price') }}:</b> {{ $seed->price }}<br />

                            </div>
                        </div><br />

                    @endforeach
                @else

                    <div class="card">

                        <div class="card-header">{{ __('external.seed') }}</div>

                        <div class="card-body">

                            <label class="col-ld-8 ">{{ __('external.noInformation') }}</label><br />
                            <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"
                                class="btn btn-outline-primary">{{ __('general.return') }}</a>

                        </div>
                    </div>

                @endif



            </div>

        </div>

    </div>

@endsection
