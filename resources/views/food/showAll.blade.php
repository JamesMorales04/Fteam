@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Food list</h1>

    <ul>
        @foreach ($data as $food)
        <br/>
        <div class="card">
                <div class="card-header">{{$food->getName()}} </div>
                
                <div class="card-body">
                @if ($loop->index < 2)
                     <strong > <u> food id:
                    <a href="{{ route('food.show',['id' => $food->getId()]) }}"> {{$food->getId()}} <br /> </a> </u> </strong> 
                    <br/>
                @else 
                    <b>food id:</b> 
                    <a href="{{ route('food.show',['id' => $food->getId()]) }}"> {{$food->getId()}} <br /> </a>
                    <br/>
                @endif
                    <b>food name:</b> {{$food->getName()}} <br />
                    <b>food status:</b> {{$food->getAvailability() ? "Available" : "Not available"}} <br />
                    <b>food price:</b> {{$food->getPrice()}}<br />
                </div>
            </div>
        @endforeach
    </ul>
</div>
@endsection
