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
        <ul>
            @foreach ($data['reviews'] as $reviews)
            <br/>
            <div class="card">
                    <div class="card-body"> 
                        <div class="row">                            
                            <div class="col align-self-start"><strong>{{ __('messages.userID') }}:</strong> {{$reviews->getUserId()}} </div>
                            <div class="col align-self-start"><strong>{{ __('messages.comments') }}:</strong> {{$reviews->getComments()}} </div>
                            <div class="col align-self-start"><strong>{{ __('messages.rating') }}:</strong> {{$reviews->getRating()}} </div>
                            @if ($reviews->getUserId() == Auth::Id())
                                <div class="col align-self-end">
                                    <div class="col-auto" >
                                        <form method="POST" action="{{ route('reviews.delete',['id' => $reviews->getId()]) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-outline-danger" > {{ __('messages.delete') }} </button>
                                        </form>
                                    </div>     
                                </div>
                                <div class="col align-self-end">
                                    <div class="col-auto" >
                                        <input type="submit" class="btn btn-outline-success" value="{{ __('messages.edit') }}" onclick= "location='{{ route('reviews.update',['id' => $reviews->getId()]) }}'">
                                    </div>     
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>

    </div>
</div>

@endsection
