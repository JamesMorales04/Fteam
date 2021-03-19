@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul id="errors">
                @foreach($data["foods"] as $food)
                    <li>
                    {{ $food->getId() }} - {{ $food->getName() }} : {{ $food->getPrice() }}
                    <a href="{{ route('shop.add', ['id'=> $food->getId()]) }}">Add to cart</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection