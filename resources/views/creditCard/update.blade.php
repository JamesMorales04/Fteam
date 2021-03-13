@extends('layouts.app')

@section("title", $creditCard->getCardName())

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Create Credit Card</div>

                <div class="card-body">

                    @if($errors->any())

                    <ul id="errors">

                        @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                    @endif
                    <form role="form" method="POST" action="{{ route('creditCard.updateSave')}}" required>
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardId" name="cardId" placeholder="cardId" value="{{ $creditCard->getId() }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Card Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardName" name="cardName" placeholder="CardName" value="{{ $creditCard->getCardName() }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Security Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="securityCode" name="securityCode" placeholder="Security Code" value="{{  $creditCard->getSecurityCode() }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Expiration Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="expirationDate" name="expirationDate" placeholder="Expiration Date" value="{{ $creditCard->getExpirationDate() }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Card Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="cardNumber" value="{{ $creditCard->getCardNumber() }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <input type="submit" value="Enviar" name="submit" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection