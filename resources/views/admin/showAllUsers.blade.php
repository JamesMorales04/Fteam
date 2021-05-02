@extends('layouts.app')

@section('title', __('user.users'))
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('user.users') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('user.user') }} </p>
    </div>
@endsection
@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (sizeOf($data['users']) > 0)
                    @foreach ($data['users'] as $user)
                        <div class="card">

                            <strong>
                                <div class="card-header">{{ __('user.user') }} {{ $user->getId() }}</div>
                            </strong>

                            <div class="card-body">

                                <b>{{ __('general.email') }}:</b> {{ $user->getEmail() }}<br />
                                <b>{{ __('general.address') }}:</b> {{ $user->getAddress() }}<br />
                                <b>{{ __('general.password') }}:</b> {{ $user->getPassword() }}<br />
                                <b>{{ __('general.creationDate') }}:</b> {{ $user->getCreationDate() }}<br />
                                <b>{{ __('general.role') }}:</b> {{ $user->getRole() }}<br />

                            </div>
                        </div><br />

                    @endforeach
                @else

                    <div class="card">

                        <div class="card-header">{{ __('user.user') }}</div>

                        <div class="card-body">

                            <label class="col-ld-8 ">{{ __('user.noUsers') }}</label><br />
                            <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"
                                class="btn btn-outline-primary">{{ __('general.return') }}</a>

                        </div>
                    </div>

                @endif



            </div>

        </div>

    </div>

@endsection
