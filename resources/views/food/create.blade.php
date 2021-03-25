@extends('layouts.app')

@section('title', $data['title'])

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('messages.createFood') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('food.save') }}">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.name') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="Enter name" name="name"
                                        value="{{ old('name') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('messages.add') }}
                                    {{ __('messages.description') }}</label>
                                <div class="col-8">
                                    <textarea cols="40" name="description" class="form-control" spellcheck="true"
                                        value="{{ old('description') }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('messages.avaliable') }}</label>
                                <div class="col-sm-10 col col-lg-2">
                                    <input type="checkbox" class="col-sm-100" name="availability"
                                        value="{{ old('availability') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('messages.add') }} {{ __('messages.recipe') }}
                                </label>
                                <div class="col-8">
                                    <textarea cols="40" name="recipe" class="form-control" spellcheck="true"
                                        value="{{ old('recipe') }}"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('messages.add') }}
                                    {{ __('messages.price') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="0000" name="price"
                                        value="{{ old('price') }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('messages.add') }}
                                    {{ __('messages.ingredients') }}</label>
                                @foreach ($data['ingredients'] as $ingredients)
                                    <div class="checkbox">
                                        <label>
                                            <div class="col">
                                                <input type="checkbox" name="ingredients[]"
                                                    value="{{ $ingredients->getId() }}">
                                                {{ $ingredients->getName() }}
                                            </div>

                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group row col-md-auto">
                                <input class="btn btn-primary" type="submit" value="Send" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <br />
@endsection
