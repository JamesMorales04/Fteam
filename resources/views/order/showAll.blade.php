@extends('layouts.app')

@section('title', __('messages.orders') )

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('messages.orders') }}</div>

                    <div class="card-body">

                        @if(sizeOf($orders)>=1)
                        @foreach ($orders as $order)

                            <b>{{ __('messages.order') }}{{ $loop->index + 1 }}: </b><br />

                            <a method="GET" href="{{ route('order.show', ['id' => $order->getID()]) }}" type="button"
                                class="btn btn-outline-primary">{{ __('messages.view') }}</a><br /><br />

                        @endforeach
                        @else 
                        <label class="col-ld-8 ">{{ __('messages.noOrders') }}</label><br />
                        <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"class="btn btn-outline-primary">{{ __('messages.return') }}</a>
                        @endif



                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
