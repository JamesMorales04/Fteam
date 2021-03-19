@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Food list</h1>

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
                    <b>food description:</b> {{$food->getDescription()}} <br />
                    <b>food status:</b> {{$food->getAvailability() ? "Available" : "Not available"}} <br />
                    <b>food price:</b> {{$food->getPrice()}}<br />
                    <div class="row">
                        <div class="col-auto"> 
                            <a href="{{ route('shop.add', ['id'=> $food->getId()]) }}"> Add to cart </a> 
                        </div>

                        <div class="col-auto"> 
                            <a href="{{ route('shop.add', ['id'=> $food->getId()]) }}">{{  __('messages.askForIngredients')  }}</a> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>
@endsection
