@extends('layouts.app')

@section("title", $data['user']->getName())

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $data['user']->getName() }}</div>

                <div class="card-body">

                    <b>Email: </b> {{ $data['user']->getEmail() }}<br />
                    <b>Address: </b> {{ $data['user']->getAddress() }}<br />
                    <b>Password: </b> {{ $data['user']->getPassword() }}<br />
                    <b>Creation Date: </b> {{ $data['user']->getCreationDate() }}<br />
                    <b>Role: </b> {{ $data['user']->getRole() }}<br />

                    @if(!$data['card'])
                    <b>Credit Card: </b>
                    <a method="GET" href="{{ route('creditCard.create')}}" type="button" class="btn btn-outline-primary">Add</a>

                    @else
                    <b>Add new credit card: </b>
                    <a method="GET" href="{{ route('creditCard.create')}}" type="button" class="btn btn-outline-primary">Add</a><br />
                    @foreach($data['card'] as $card)

                    <b>Credit Card {{($loop->index)+1}}: </b><br />

                    <a method="GET" href="{{ route('creditCard.show',['id' => $card->getID()])}}" type="button" class="btn btn-outline-primary">Ver</a>  
                    <a method="GET" href="{{ route('creditCard.delete',['id' => $card->getID()])}}" type="button" class="btn btn-outline-danger">Borrar</a><br />

                    @endforeach

                    
                    @endif
                    <br />
                    <br />
                    <a method="PUT" href="{{ route('user.update',['id' => $data['user']->getID()])}}" type="button" class="btn btn-outline-primary">Editar</a>
                    <a method="DELETE" href="{{ route('user.delete',['id' => $data['user']->getID()])}}" type="button" class="btn btn-outline-danger">Borrar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection