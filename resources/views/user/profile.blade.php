@extends('layouts.app')

@section("title", $user->getName())

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{ $user->getName() }}</div>

                <div class="card-body">

                    <b>Email: </b> {{ $user->getEmail() }}<br />
                    <b>Address: </b> {{ $user->getAddress() }}<br />
                    <b>Password: </b> {{ $user->getPassword() }}<br />
                    <b>Creation Date: </b> {{ $user->getCreationDate() }}<br />
                    <b>Role: </b> {{ $user->getRole() }}<br />
                    <b>Credit Card: </b>
                        @if(FALSE)
                        <a method="GET" href="{{ route('creditCard.create')}}"  type="button" class="btn btn-outline-primary" >Add</a>
                        @else
                        <a method="GET" href="{{ route('creditCard.show',['id' => $user->getID()])}}"  type="button" class="btn btn-outline-primary" >View</a>
                        <a method="GET" href="{{ route('creditCard.update',['id' => $user->getID()])}}"  type="button" class="btn btn-outline-secondary" >Edit</a>
                        @endif
                    <br />
                    <br />
                    <a method="PUT" href="{{ route('user.update',['id' => $user->getID()])}}"  type="button" class="btn btn-outline-primary" >Editar</a>
                    <a method="DELETE" href="{{ route('user.delete',['id' => $user->getID()])}}"  type="button" class="btn btn-outline-danger" >Borrar</a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection