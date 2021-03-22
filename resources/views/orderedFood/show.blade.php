@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{  __('messages.orders')  }} {{$data->getId()}}</div>

                <div class="card-body">
                    <b>{{  __('messages.amount')  }}:</b> {{$data->getAmount()}} <br />
                    <b>{{  __('messages.subTotal')  }}:</b> {{$data->getSubTotal()}} <br />
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('orderedFood.delete',['id' => $data->getId()]) }}">
                        @csrf @method('DELETE')
                        <button class="btn-danger" >{{  __('messages.delete')  }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection