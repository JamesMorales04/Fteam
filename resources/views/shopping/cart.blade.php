@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ __('messages.shoppingCart') }}</div>

                    <div class="card-body">
                        <ul id="errors">
                            @foreach ($data['foods'] as $food)

                                {{ __('messages.amount') }} {{ $food[1] }} - {{ $food[0]->getName() }} :
                                {{ $food[0]->getPrice() }}
                                {{ __('messages.foodType') }} {{ $food[2] ? __('messages.yes') : __('messages.no') }}

                            @endforeach
                        </ul>
                        <br />
                        {{ __('messages.total') }}: {{ $data['total'] }}<br /><br />
                        <div class="row">
                            <div class="col-auto">
                                @if ($data['foods'])
                                    <a method="GET" href="{{ route('shop.buy') }}">
                                        <button class="btn btn-outline-primary"> {{ __('messages.buy') }} </button>
                                    </a>
                                @else
                                    <button class="btn outline-primary"> {{ __('messages.buy') }} </button>
                                @endif
                            </div>

                            <div class="col-auto">
                                <a href="{{ route('shop.removeAll') }}">
                                    <button class="btn btn-outline-danger"> {{ __('messages.removeAll') }} </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
