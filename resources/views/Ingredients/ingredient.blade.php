@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["product"]->getName() }}</div>

                <div class="card-body">
                    <b>Product ID:</b> {{$data["product"]->getId()}}<br />
                    <b>Product name:</b> {{$data["product"]->getName() }}<br />
                    <b>Product price:</b> {{ $data["product"]->getPrice() }}<br />
                    <b>Product amount:</b> {{ $data["product"]->getAmount() }}<br />   
                    @if ($data["product"]->getAvailability()==1)
                        <b>Product availability:</b> Yes <br /><br />    
                    @else
                        <b>Product availability:</b> No <br /><br />
                    @endif
                    <center>
                        <input type="submit" value="Back to Ingredients" onclick= "location='{{ route('Ingredients.show') }}'">
                        <input type="submit" value="Delete Ingredient" onclick= "location='/Fteam/public/ingredient/delete/{{ $data["product"]->getId() }}' " method="put">
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
