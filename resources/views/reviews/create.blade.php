@extends('layouts.app')

@section("title", $data["title"])

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">{{ __('messages.createReviews') }}</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('messages.createReviews') }}</p>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">{{ __('messages.createReviews') }}</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <center>
                    <form method="POST" action="{{ route('reviews.save') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{ Auth::Id() }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="food_id" name="food_id" placeholder="food_id" value="{{ $data['food_id'] }}" readonly>
                            </div>
                        </div>

                        <div class="rate">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-auto">{{ __('messages.comments') }}</label>
                            <div class="col-8">
                                <textarea cols="40" name="comments" class="form-control" spellcheck="true" value="{{ old('comments') }}" ></textarea>
                            </div>
                        </div>

                        <br />

                        <div>
                            <center><input class="btn btn-outline-success" type="submit" value="{{ __('messages.send') }}" /></center>
                        </div>
                    </form>
                    <br />
                    <div>
                        <center><input type="submit" class="btn btn-outline-danger" value="{{ __('messages.backFood') }}" onclick= "location='{{ route('food.showAll') }}'"></center>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection