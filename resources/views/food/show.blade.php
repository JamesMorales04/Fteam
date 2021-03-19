@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data['food']->getName() }}</div>

                <div class="card-body">
                    <b>food name:</b> {{ $data['food']->getName() }}<br />
                    <b>food status:</b> {{ $data['food']->getAvailability() ? "Available" : "Not available" }}<br />
                    <b>food recipe:</b> {{ $data['food']->getRecipe() }}<br />
                    <b>food price:</b> {{ $data['food']->getPrice() }}<br />

                    <div class="row">
                        <div class="col-auto" >
                            <form method="PUT" action="{{ route('home.index') }}">
                                @csrf @method('PUT')
                                <button class="btn btn-outline-primary" > {{ __('messages.edit') }} </button>
                            </form>
                        </div>

                        <div class="col-auto" >
                            <form method="POST" action="{{ route('food.delete',['id' => $data['food']['id']]) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-outline-danger" > {{ __('messages.delete') }} </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection