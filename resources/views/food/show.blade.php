@extends('layouts.app')

@section("title", $data["title"])

@section('header')
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading text-uppercase mb-0">{{$data["title"]}}</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="masthead-subheading font-weight-light mb-0">Website - {{$data["title"]}}</p>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data['food']->getName() }}</div>

                <div class="card-body">
                    <b>food name:</b> {{ $data['food']->getName() }}<br />
                    <b>food status:</b> {{ $data['food']->getAvailability() ? "Available" : "Not available" }}<br />
                    <b>food recipe:</b> {{ $data['food']->getRecipe() }}<br />

                    <b>food price:</b> {{ $data['food']->getPrice() }}<br />

                    <div class="row">
                        <div class="col-auto" >
                            <form method="PUT" action="{{ route('home.index') }}">
                                @csrf @method('PUT')
                                <button class="btn btn-outline-primary" > {{ __('messages.edit') }} </button>
                            </form>
                        </div>

                        <div class="col-auto" >
                            <form method="POST" action="{{ route('food.delete',['id' => $data['food']['id']]) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger" > {{ __('messages.delete') }} </button>
                            </form>
                        </div>
                    </div>

                    <b>food price:</b> {{ $data['food']->getPrice() }}<br/><br/>
                    <b>Comments:</b>
                    <ul>
                        @foreach($data['reviews'] as $food)
                            @foreach($food->reviews as $comment)
                                @if ( $data["food"]->getId() == $comment->getFoodId())
                                    <li>{{ $comment->getComments() }}</li> 
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('food.delete',['id' => $data['food']['id']]) }}">
                        @csrf @method('DELETE')
                        <button class="btn-danger" >Delete</button>
                    </form>
                    <br/>
                    <input class="btn btn-outline-primary" type="submit" value="Create comment" onclick= "location='/Fteam/public/reviews/create/{{ $data["food"]->getId() }}' " method="put">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection