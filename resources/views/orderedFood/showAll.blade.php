@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{  __('messages.orderedList')  }}</h1>

    <ul>
        @foreach ($data as $orderedFood)
        <br/>
        <div class="card">
                <div class="card-header">{{  __('messages.orders')  }} {{$orderedFood->getId()}} </div>
                
                <div class="card-body">
                    <b>{{  __('messages.foodId')  }}</b> 
                    <a href="{{ route('orderedFood.show',['id' => $orderedFood->getId()]) }}"> {{$orderedFood->getId()}} <br /> </a>
                    <br/>
                    <b>{{  __('messages.amount')  }}:</b> {{$orderedFood->getAmount()}} <br />
                    <b>{{  __('messages.subTotal')  }}:</b> {{$orderedFood->getSubTotal()}} <br />
                </div>
            </div>
        @endforeach
    </ul>
</div>
@endsection
