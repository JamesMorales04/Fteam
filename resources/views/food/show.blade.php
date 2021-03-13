@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data->getName() }}</div>

                <div class="card-body">
                    <b>food name:</b> {{ $data->getName() }}<br />
                    <b>food status:</b> {{ $data->getAvailability() ? "Available" : "Not available" }}<br />
                    <b>food recipe:</b> {{ $data->getRecipe() }}<br />
                    <b>food price:</b> {{ $data->getPrice() }}<br />
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('food.delete',['id' => $data['food']['id']]) }}">
                        @csrf @method('DELETE')
                        <button class="btn-danger" >Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
