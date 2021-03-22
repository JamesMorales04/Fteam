@extends('layouts.app')

@section('title', $data['title'])
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
@section('content')

    <div class="container">

        <div class="row justify-content-center">
            @include('util.message')
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('messages.creditCard') }}</strong>
                    </div>
                    @if ($errors->any())
                        <ul id="errors">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form role="form" method="POST" action="{{ route('creditCard.save') }}" required>
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="user_id"
                                    value="{{ Auth::Id() }}" readonly>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name"
                                            name="cardName" value="{{ old('cardName') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ccnumber">{{ __('messages.cardNumber') }}</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" pattern="[0-9]*" inputmode="numeric"
                                                name="cardNumber" placeholder="0000 0000 0000 0000"
                                                value="{{ old('cardNumber') }}" required autocomplete="email" required>
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
                                    <label for="ccmonth">{{ __('messages.month') }}</label>
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
                                    <label for="ccyear">{{ __('messages.year') }}</label>
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
                                        <label for="cvv">{{ __('messages.cvv') }}</label>
                                        <input class="form-control" id="securityCode" type="text" placeholder="123"
                                            name="securityCode" value="{{ old('securityCode') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="form-group">
                                <input type="submit" value={{ __('messages.send') }} name="submit"
                                    class="btn btn-primary" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
