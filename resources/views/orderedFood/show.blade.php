@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ordered {{$data->getId()}}</div>

                <div class="card-body">
                    <b>ordered amount:</b> {{$data->getAmount()}} <br />
                    <b>ordered sub Total</b> {{$data->getSubTotal()}} <br />
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('orderedFood.delete',['id' => $data->getId()]) }}">
                        @csrf @method('DELETE')
                        <button class="btn-danger" >Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection