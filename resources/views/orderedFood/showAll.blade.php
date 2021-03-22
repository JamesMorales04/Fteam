@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ordered food list</h1>

        <ul>
            @foreach ($data as $orderedFood)
                <br />
                <div class="card">
                    <div class="card-header">Ordered {{ $orderedFood->getId() }} </div>

                    <div class="card-body">
                        <b>Ordered food id:</b>
                        <a href="{{ route('orderedFood.show', ['id' => $orderedFood->getId()]) }}">
                            {{ $orderedFood->getId() }} <br /> </a>
                        <br />
                        <b>ordered amount:</b> {{ $orderedFood->getAmount() }} <br />
                        <b>ordered sub Total</b> {{ $orderedFood->getSubTotal() }} <br />
                    </div>
                </div>
            @endforeach
        </ul>
    </div>
@endsection
