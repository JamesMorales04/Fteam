@extends('layouts.app')

@section("title", $creditCard->getCardName())

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $creditCard->getCardName() }}</div>

                <div class="card-body">

                    <b>Card Name: </b> {{ $creditCard->getCardName() }}<br />
                    <b>Card Number: </b> {{ $creditCard->getCardNumber() }}<br />
                    <b>Creation Date: </b> {{ $creditCard->getRegisterDate() }}<br /> 
                    <br />
                    <a method="GET" href="{{ route('creditCard.update',['id' => $creditCard->getID()])}}"  type="button" class="btn btn-outline-primary" >Editar</a>
                    <a method="POST" href="{{ route('creditCard.delete',['id' => $creditCard->getID()])}}"  type="button" class="btn btn-outline-danger" >Borrar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection