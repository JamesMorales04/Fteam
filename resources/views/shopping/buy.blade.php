@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('buyshoppingcart') }}
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card ">
                    <div class="card-body">
                        <div class="px-4 py-5">
                            <h5 class="text-uppercase"></h5>
                            <h4 class="mt-5 theme-color mb-5">{{ __('order.thanks') }}</h4> <span
                                class="theme-color">{{ __('order.payment') }}</span>
                            <div class="mb-3">
                                <hr class="new1">
                            </div>
                            @foreach ($data['food'] as $food)

                                <div class="d-flex justify-content-between mt-3">
                                    <small class="col-sm">{{ $food[0] }}</small>
                                    <small class="col-sm">{{ __('general.amount') }}: {{ $food[2] }}</small>
                                    <small class="col-sm"> {{ __('order.foodType') }}:
                                        {{ $food[3] ? __('order.yes') : __('general.no') }}</small>
                                    <small>{{ $food[1] }}</small>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-between mt-3"> <span
                                    class="font-weight-bold">{{ __('order.total') }}</span>
                                <span class="font-weight-bold theme-color">{{ $data['total'] }}</span>
                            </div>
                            


                            <div class="text-center mt-5"><button type="button" class="btn btn-outline-primary"
                                    onclick="window.location='{{ route('shop.email', ['data' => $data]) }}'">{{ __('general.sendEmail') }}</button>

                            </div>

                            <div class="text-center mt-5"><button type="button" class="btn btn-outline-primary"
                                onclick="window.location='{{ route('shop.pdf', ['data' => $data]) }}'">{{ __('general.oldPDF') }}</button>
                                <button type="button" class="btn btn-outline-primary"
                                onclick="window.print()">{{ __('general.download') }}</button>
                            </div>

                            <div class="text-center mt-5">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br />
@endsection
