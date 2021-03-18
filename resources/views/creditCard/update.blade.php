

@extends('layouts.app')

@section("title", $creditCard->getCardName())


@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>{{  __('messages.creditCard')  }}</strong>
                    </div>
                    <form role="form" method="POST" action="{{  route('creditCard.updateSave') }}" required>
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="cardId" name="cardId" placeholder="cardId" value="{{ $creditCard->getId() }}" readonly>
                            </div>
                        </div>
      
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{  __('messages.name')  }}</label>
                                        <input class="form-control" id="name" type="text" placeholder="Enter your name"
                                            name="cardName" value="{{ $creditCard->getCardName() }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="ccnumber">{{  __('messages.cardName')  }}</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="cardNumber"
                                                placeholder="0000 0000 0000 0000" value="{{ $creditCard->getCardNumber() }}"
                                                required autocomplete="email" required>
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
                                    <label for="ccmonth">{{  __('messages.month')  }}</label>
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
                                    <label for="ccyear">{{  __('messages.year')  }}</label>
                                    <select class="form-control"  id="expirationYear" name="expirationYear" required>
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
                                        <label for="cvv">{{  __('messages.cvv')  }}</label>
                                        <input class="form-control" id="securityCode" type="text" placeholder="123" name="securityCode" value="{{ $creditCard->getSecurityCode() }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="form-group">
                                <input type="submit" value={{  __('messages.send')  }} name="submit" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection



