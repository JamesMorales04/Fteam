@extends('layouts.shop')

@section('content')
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <div class="px-4 py-5">
                            <h5 class="text-uppercase"></h5>
                            <h4 class="mt-5 theme-color mb-5">{{ __('messages.thanks') }}</h4> <span
                                class="theme-color">{{ __('messages.payment') }}</span>
                            <div class="mb-3">
                                <hr class="new1">
                            </div>
                            @foreach ($food as $foodAux)
                                <div class="d-flex justify-content-between">
                                    <small class="col-sm">{{ $foodAux[0] }}</small>
                                    <small class="col-sm">{{ __('messages.amount') }}: {{ $foodAux[2] }}</small>
                                    <small class="col-sm"> {{ __('messages.foodType') }}:
                                        {{ $foodAux[3] ? 'Si' : 'No' }}</small>
                                    <small>{{ $foodAux[1] }}</small>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-between mt-3"> <span
                                    class="font-weight-bold">{{ __('messages.total') }}</span>
                                <span class="font-weight-bold theme-color">{{ $total }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br />
@endsection
