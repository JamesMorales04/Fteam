@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{  __('messages.best-selling')  }}</h1>

    <ul>
        @foreach ($data as $food)
        <br/>
        <div class="card">
                <div class="card-header"> 
                    <div class="row">
                        <div class="col align-self-start"> {{$food}} </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>
</div>
@endsection