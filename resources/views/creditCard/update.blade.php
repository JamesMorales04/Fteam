@extends('layouts.app')

@section('title', $creditCard->getCardName())
@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('creditCard.creditCard') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('creditCard.creditCard') }} </p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('updatecreditcard', $user) }}
    <div class="container">

        <div class="row justify-content-center">
            @include('util.message')

            <div class="col-sm-6">
                @include('util.message')

                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('creditCard.creditCard') }}</strong>
                    </div>

                    <form role="form" method="POST" action="{{ route('creditCard.updateSave') }}" required>
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="cardId" name="cardId" placeholder="cardId"
                                    value="{{ $creditCard->getId() }}" readonly>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <ul id="errors">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('general.name') }}</label>
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name"
                                            name="cardName" value="{{ $creditCard->getCardName() }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ccnumber">{{ __('creditCard.cardName') }}</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="cardNumber"
                                                placeholder="0000 0000 0000 0000"
                                                value="{{ $creditCard->getCardNumber() }}" required autocomplete="email"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="mdi mdi-credit-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="ccmonth">{{ __('general.month') }}</label>
                                    <select class="form-control" id="expirationMonth" name="expirationMonth" required>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="ccyear">{{ __('general.year') }}</label>
                                    <select class="form-control" id="expirationYear" name="expirationYear" required>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
                                        <option>2025</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cvv">{{ __('creditCard.cvv') }}</label>
                                        <input class="form-control" id="securityCode" type="text" placeholder="123"
                                            name="securityCode" value="{{ $creditCard->getSecurityCode() }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="form-group">
                                <input type="submit" value={{ __('general.send') }} name="submit"
                                    class="btn btn-primary" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
