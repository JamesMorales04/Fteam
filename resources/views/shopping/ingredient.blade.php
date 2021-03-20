@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ingedient list</h1>

    <ul>
        
        <br/>
        <div class="card">
                <div class="card-header"> 
                    <div class="row">
                        

                    </div>
                </div>
                
                <div class="card-body">
                    @foreach ($data as $ingedient)
                        <div class="col align-self-start"> {{$ingedient->getName()}} </div>
                    @endforeach
                </div>
            </div>
        
    </ul>
</div>
@endsection
