@extends('layouts.app')

@section('content')
<br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                {{  __('messages.confirmation')  }}

            </div>
            <div class="card-body">
                <a href="{{ route('home.index') }}">
                    <button class="btn btn-outline-primary" >{{  __('messages.return')  }}</button>
                </a>
            </div>
        </div>
        
    </div>
</div>
<br/>
@endsection