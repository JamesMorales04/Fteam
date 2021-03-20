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
    <div class="card">
        <div class="card-header"> 
            <div class="col align-self-start"> {{  __('messages.reviews')  }} {{$data["title"]}} </div>
        </div>
        <div class="card-body">
            @foreach ($data['reviews'] as $comment)
                <b>{{$loop->index+1}}</b> {{ $comment->getComments() }}<br />
            @endforeach
        </div>
    </div>
</div>

@endsection
