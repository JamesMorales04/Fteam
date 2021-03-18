@extends('layouts.app')

@section("title", "Ingredients")

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">INGREDIENTS</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - Ingredients</p>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Ingredients</div>

                <div class="card-body">
                    <b>These are the products available:</b><br />
                    <ul>
                        @foreach($data["ingredients"] as $product)
                            <li><strong>ID:</strong> <a href="{{ route('Ingredients.show') }}/{{$product->getId()}}">{{ $product->getId() }}</a> - <strong>Name:</strong> {{ $product->getName() }} </li>     
                        @endforeach        
                    </ul>
                    <center><input type="submit"  class="btn btn-outline-danger" value="Back to Home" onclick= "location='{{ route('home.index') }}'"></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

