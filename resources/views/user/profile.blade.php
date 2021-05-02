@extends('layouts.app')

@section('title', $data['user']->getName())

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('user.profile') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('user.profile') }} </p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('userprofile', $data['user']) }}
    {{-- {{$data['user']}} --}}
    <div class="container">

        <div class="row justify-content-center">
            @include('util.message')

            <div class="col-md-8">
                <div class="card-deck">

                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <div class="col align-self-start"> {{ $data['user']->getName() }} </div>

                                <div class="col align-self-end">
                                    <a class="float-right" href="{{ route('order.showAll') }}">
                                        <button class="btn btn-outline-primary">{{ __('order.orders') }}</button>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">

                            <b>{{ __('general.email') }}:</b> {{ $data['user']->getEmail() }}<br />
                            <b>{{ __('general.address') }}:</b> {{ $data['user']->getAddress() }}<br />
                            <b>{{ __('general.password') }}:</b> {{ $data['user']->getPassword() }}<br />
                            <b>{{ __('general.creationDate') }}:</b> {{ $data['user']->getCreationDate() }}<br />
                            <b>{{ __('general.role') }}:</b> {{ $data['user']->getRole() }}<br />

                            <br />
                            <a method="PUT" href="{{ route('user.update', ['id' => $data['user']->getID()]) }}"
                                type="button" class="btn btn-outline-primary">{{ __('general.edit') }}</a>
                            <a method="DELETE" href="{{ route('user.delete', ['id' => $data['user']->getID()]) }}"
                                type="button" class="btn btn-outline-danger">{{ __('general.delete') }}</a>

                        </div>

                    </div>

                    <div class="card">

                        <div class="card-header">{{ __('creditCard.creditCard') }}</div>

                        <div class="card-body">

                            @if (!$data['card'])
                                <b>{{ __('creditCard.creditCard') }} </b>
                                <a method="GET" href="{{ route('creditCard.create') }}" type="button"
                                    class="btn btn-outline-primary">{{ __('general.add') }}</a>

                            @else
                                <b>{{ __('creditCard.newCreditCard') }} </b><br />
                                <a method="GET" href="{{ route('creditCard.create') }}" type="button"
                                    class="btn btn-outline-primary">{{ __('general.add') }}</a><br /><br />

                                @foreach ($data['card'] as $card)

                                    <b>{{ __('creditCard.creditCard') }} {{ $loop->index + 1 }}: </b><br />

                                    <a method="GET" href="{{ route('creditCard.show', ['id' => $card->getID()]) }}"
                                        type="button" class="btn btn-outline-primary">{{ __('general.view') }}</a>
                                    <a method="GET" href="{{ route('creditCard.delete', ['id' => $card->getID()]) }}"
                                        type="button"
                                        class="btn btn-outline-danger">{{ __('general.delete') }}</a><br />

                                @endforeach

                            @endif


                        </div>
                    </div>

                </div>
                <br>
            </div>

        </div>

    </div>

@endsection
