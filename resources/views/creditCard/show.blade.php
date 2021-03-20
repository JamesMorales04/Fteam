@extends('layouts.app')

@section("title", $creditCard->getCardName())

@section('content')

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.creditCard') }} </h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.creditCard') }} </p>
</div>
@endsection

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $creditCard->getCardName() }}</div>

                <div class="card-body">

                    <b>{{  __('messages.cardName')  }}:</b> {{ $creditCard->getCardName() }}<br />
                    <b>{{  __('messages.cardNumber')  }}:</b> {{ $creditCard->getCardNumber() }}<br />
                    <b>{{  __('messages.creationDate')  }}:</b> {{ $creditCard->getRegisterDate() }}<br /> 
                    <br />

                    <a method="GET" href="{{ route('creditCard.update',['id' => $creditCard->getId()])}}"  type="button" class="btn btn-outline-primary" >{{  __('messages.edit')  }}</a>
                    <a method="POST" href="{{ route('creditCard.delete',['id' => $creditCard->getId()])}}"  type="button" class="btn btn-outline-danger" >{{  __('messages.delete')  }}</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection