@extends('layouts.app')

@section('title', __('messages.order') )

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header"><strong>{{ __('messages.order') }} {{ $order['orderBase']->getId()}}</div></strong>

                    <div class="card-body">

                        @foreach ($order['order'] as $food)

                            <strong>name:</strong> {{ $food->getAmount()}}</b><br />

                        @endforeach
                        <label class="col-ld-8 "><strong>{{ __('messages.total') }}</strong>: {{ $order['orderBase']->getTotal()}}</label><br />
                        <label class="col-ld-8 "><strong>{{__('messages.creationDate')  }}</strong>: {{ $order['orderBase']->getRegisterDate()}}</label><br />
                        <a method="GET" href="{{ redirect()->back()->getTargetUrl() }}" type="button"class="btn btn-outline-primary">{{ __('messages.return') }}</a>
                        



                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
