@extends('layouts.app')

@section("title", $creditCard->getCardName())

@section('content')

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