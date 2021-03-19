@extends('layouts.app')

@section("title", $data["title"])

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">CREATE</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - Create reviews</p>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create review</div>
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
                            <label class="col-sm-2 col-form-label">User Id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{ Auth::Id() }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Food Id</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="food_id" name="food_id" placeholder="food_id" value="{{ $data['food_id'] }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Rating</label>
                            <div class="col-8">
                                <input type="number" class="form-control"  placeholder="Enter rating from 1 to 5" name="rating" value="{{ old('rating') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 col col-lg-2">
                                <input type="checkbox" class="col-sm-100" name="status" value="{{ old('status') }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-auto">Comments</label>
                            <div class="col-8">
                                <textarea cols="40" name="comments" class="form-control" spellcheck="true" value="{{ old('comments') }}" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row col-md-auto">
                            <center><input class="btn btn-outline-success" type="submit" value="Send" /></center>
                        </div>
                    </form>
                    <div class="form-group row col-md-auto">
                        <center><input type="submit" class="btn btn-outline-danger" value="Back to Food" onclick= "location='{{ route('food.showAll') }}'"></center>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection