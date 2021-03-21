@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col align-self-start"> <h1>{{  __('messages.menu')  }}</h1> </div>

        <div class="col align-self-end">
            <a class="float-right" href="{{ route('food.create')}}">
                <button class="btn btn-outline-primary" >{{  __('messages.create')  }}</button>
            </a>
        </div>
    </div>
    <input style="align-self: left" type="submit" class="btn btn-outline-primary" value="{{ __('messages.topThree') }}" onclick= "location='{{ route('food.topThree') }}'">

    <ul>
        @foreach ($data as $food)
        <br/>
        <div class="card">
                <div class="card-header"> 
                    <div class="row">
                        <div class="col align-self-start"> {{$food->getName()}} </div>

                        <div class="col align-self-end">
                            <a class="float-right" href="{{ route('food.show',['id' => $food->getId()]) }}">
                                <button class="btn btn-outline-primary" >{{  __('messages.view')  }}</button>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <b>{{  __('messages.description')  }}:</b> {{$food->getDescription()}} <br />
                    <b>{{  __('messages.status')  }}:</b> {{$food->getAvailability() ? __('messages.available') : __('messages.notAvailable')}} <br />
                    <b>{{  __('messages.price')  }}:</b> {{$food->getPrice()}}<br />
                    <div class="row">
                        <div class="col-auto"> 
                            <a href="{{ route('shop.add', ['id'=> $food->getId()]) }}">{{  __('messages.AddCart')  }}  </a> 
                        </div>

                        <div class="col-auto"> 
                            <a href="{{ route('shop.addAsIngresients', ['id'=> $food->getId()]) }}">{{  __('messages.askForIngredients')  }}</a> 
                        </div>
                        <div class="col align-self-end" >
                            <form class="float-right" method="PUT" action="{{ route('reviews.create',['id' => $food->getId()]) }}">
                                @csrf @method('PUT')
                                <button class="btn btn-outline-primary" > {{  __('messages.createReviews')  }}</button>
                            </form>
                            <div class="col-auto">
                                <a class="float-right" href="{{ route('reviews.show',['id' => $food->getId()]) }}">
                                    <button class="btn btn-outline-primary" >{{  __('messages.seeReviews')  }}</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>
@endsection
