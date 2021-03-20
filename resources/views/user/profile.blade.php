@extends('layouts.app')

@section('title', $data['user']->getName())

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.profile') }} </h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.profile') }} </p>
</div>
@endsection

@section('content')

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
                                    <a class="float-right" href="{{ route('order.showAll')}}">
                                        <button class="btn btn-outline-primary" >{{  __('messages.orders')  }}</button>
                                    </a>
                                </div>
                            </div>
                        
                        </div>

                        

                        <div class="card-body">

                            <b>{{ __('messages.email') }}:</b> {{ $data['user']->getEmail() }}<br />
                            <b>{{ __('messages.address') }}:</b> {{ $data['user']->getAddress() }}<br />
                            <b>{{ __('messages.password') }}:</b> {{ $data['user']->getPassword() }}<br />
                            <b>{{ __('messages.creationDate') }}:</b> {{ $data['user']->getCreationDate() }}<br />
                            <b>{{ __('messages.role') }}:</b> {{ $data['user']->getRole() }}<br />


                            <br />
                            <a method="PUT" href="{{ route('user.update', ['id' => $data['user']->getID()]) }}"
                                type="button" class="btn btn-outline-primary">{{ __('messages.edit') }}</a>
                            <a method="DELETE" href="{{ route('user.delete', ['id' => $data['user']->getID()]) }}"
                                type="button" class="btn btn-outline-danger">{{ __('messages.delete') }}</a>
                        </div>

                    </div>
                    
                    <div class="card">

                        <div class="card-header">{{ __('messages.creditCard') }}</div>

                        <div class="card-body">

                            @if (!$data['card'])
                                <b>{{ __('messages.creditCard') }} </b>
                                <a method="GET" href="{{ route('creditCard.create') }}" type="button"
                                    class="btn btn-outline-primary">{{ __('messages.add') }}</a>

                            @else
                                <b>{{ __('messages.newCreditCard') }} </b><br />
                                <a method="GET" href="{{ route('creditCard.create') }}" type="button"
                                    class="btn btn-outline-primary">{{ __('messages.add') }}</a><br /><br />

                                @foreach ($data['card'] as $card)

                                    <b>{{ __('messages.creditCard') }}{{ $loop->index + 1 }}: </b><br />

                                    <a method="GET" href="{{ route('creditCard.show', ['id' => $card->getID()]) }}"
                                        type="button" class="btn btn-outline-primary">{{ __('messages.view') }}</a>
                                    <a method="GET" href="{{ route('creditCard.delete', ['id' => $card->getID()]) }}"
                                        type="button"
                                        class="btn btn-outline-danger">{{ __('messages.delete') }}</a><br />

                                @endforeach

                            @endif


                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
