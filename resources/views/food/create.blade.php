@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">Create food</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('food.save') }}">
                    @csrf
                   <li> <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" /> </li> <br>
                   <li><label for="terms">Available</label> <input type="checkbox" name="availability" value="{{ old('availability') }}" > </li>
                   <li>Enter recipe</li>
                   <textarea cols="40" name="recipe" spellcheck="true" value="{{ old('recipe') }}" ></textarea> <br>
                   <li> <input type="text" placeholder="Enter price" name="price" value="{{ old('price') }}" /> </li> <br>
                    <input type="submit" value="Send" />
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
