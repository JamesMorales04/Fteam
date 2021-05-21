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
                            <h4>{{ __('order.thanks') }}</h4> <span>{{ __('order.payment') }}</span>
                            <div>
                                <hr>
                            </div>
                            @foreach ($food as $foodAux)
                                <div>
                                    <small>{{ $foodAux[0] }}</small>
                                    <small>{{ __('general.amount') }}: {{ $foodAux[2] }}</small>
                                    <small> {{ __('order.foodType') }}:
                                        {{ $foodAux[3] ? __('general.yes') : __('general.no') }}</small>
                                    <small>{{ $foodAux[1] }}</small>
                                </div>
                            @endforeach
                            <div> <span>{{ __('order.total') }}</span>
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
