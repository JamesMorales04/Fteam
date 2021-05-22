@extends('layouts.app')

@section('title', $data['title'])

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('reviews.createReviews') }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('reviews.createReviews') }}</p>
    </div>
@endsection

@section('content')
    {{ Breadcrumbs::render('ureview', $data['food_id']) }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('reviews.createReviews') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <center>
                            <form method="POST" action="{{ route('reviews.updateSave') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="id"
                                            value="{{ $data->getId() }}" readonly>
                                    </div>
                                </div>

                                @if (Auth::user()->getRole() === 'Administrador')
                                    @if ($data->getStatus() === 1)
                                        <div class="form-group row">
                                            <label class="col-md-auto">{{ __('messages.status') }}</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" class="form-control" id="status" name="status"
                                                    placeholder="status" value="{{ old('status') }}" checked>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                            <label class="col-sm-2">{{ __('messages.status') }}</label>
                                            <div class="col-sm-3">
                                                <input type="checkbox" class="form-control" id="status" name="status"
                                                    placeholder="status" value="{{ old('status') }}">
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div>
                                    <div class="form-group row">
                                        <label for='rating' class="col-2">{{ __('reviews.rating') }}</label>
                                    </div>
                                    <div id="rating" name='rating' class="rate col-md-auto">
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
                                </div>

                                <br />
                                <br />
                                <br />

                                <div class="form-group row">
                                    <label class="col-sm-3">{{ __('reviews.comments') }}</label>
                                    <div class="col-8">
                                        <textarea cols="40" name="comments" class="form-control" spellcheck="true"
                                            value="{{ old('comments') }}">{{ $data->getComments() }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="user_id" name="user_id"
                                            placeholder="user_id" value="{{ Auth::Id() }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" id="food_id" name="food_id"
                                            placeholder="food_id" value="{{ $data->getFoodId() }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <input class="btn btn-outline-primary" type="submit"
                                            value="{{ __('general.send') }}" />
                                    </div>
                                </div>
                            </form>
                            {{-- <div class="form-group row">
                                <div class="col-2">
                                    <input type="submit" class="btn btn-outline-primary"
                                        value="{{ __('messages.backFood') }}"
                                        onclick="location='{{ route('food.showAll') }}'">
                                </div> --}}
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
