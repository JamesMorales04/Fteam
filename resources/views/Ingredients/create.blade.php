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
    <p class="masthead-subheading font-weight-light mb-0">Website - Create</p>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create product</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <center>
                    <form method="POST" action="{{ route('Ingredients.save') }}">
                        @csrf
                        <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" placeholder="Enter price" name="price" value="{{ old('price') }}" />
                        <p></p>
                        <input type="text" placeholder="Enter amount" name="amount" value="{{ old('amount') }}" />
                        <input type="text" placeholder="Enter availability" name="availability" value="{{ old('availability') }}" />
                        <input type="submit" value="Send" />
                    </form>
                </center>
                <p><center><input type="submit" value="Back to Home" onclick= "location='{{ route('home.index') }}'"></center></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
