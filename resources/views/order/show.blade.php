@extends('layouts.app')

@section("title", $order->getId())

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $order->getId() }}</div>

                <div class="card-body">

                    <b>Total: </b> {{ $order->getTotal() }}<br />
                    <b>Creation Date: </b> {{ $order->getRegisterDate() }}<br />
                    <br />
                    <a method="DELETE" href="{{ route('order.delete',['id' => $order->getID()])}}"  type="button" class="btn btn-outline-danger" >Borrar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection