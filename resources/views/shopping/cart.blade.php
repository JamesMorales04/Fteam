@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        Food in Cart
            <ul id="errors">
            
                @foreach($data["foods"] as $food)
                    <li>
                    {{ $food->getId() }} - {{ $food->getName() }} : {{ $food->getPrice() }}
                    </li>
                @endforeach
            </ul>
            <br />
            Total in cart: {{ $data['total'] }}<br /><br />
            <a href="{{ route('shop.buy') }}">Buy</a>
            <br /><br />
            <a href="{{ route('shop.removeAll') }}">Remove all food from cart</a>
        </div>
    </div>
</div>
@endsection