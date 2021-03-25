@extends('layouts.shop')

@section('content')
    <br />
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <h5></h5>
                            <h4>{{ __('messages.thanks') }}</h4> <span>{{ __('messages.payment') }}</span>
                            <div>
                                <hr>
                            </div>
                            @foreach ($food as $foodAux)
                                <div>
                                    <small>{{ $foodAux[0] }}</small>
                                    <small>{{ __('messages.amount') }}: {{ $foodAux[2] }}</small>
                                    <small> {{ __('messages.foodType') }}:
                                        {{ $foodAux[3] ? __('messages.yes') : __('messages.no') }}</small>
                                    <small>{{ $foodAux[1] }}</small>
                                </div>
                            @endforeach
                            <div> <span>{{ __('messages.total') }}</span>
                                <span>{{ $total }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
@endsection
