@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["food"]["name"] }}</div>

                <div class="card-body">
                    <b>food name:</b> {{ $data["food"]["name"] }}<br />
                    <b>food status:</b> {{ $data["food"]["availability"] ? "Available" : "Not available" }}<br />
                    <b>food recipe:</b> {{ $data["food"]["recipe"] }}<br />
                    <b>food price:</b> {{ $data["food"]["price"] }}<br />
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
