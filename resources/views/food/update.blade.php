@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('updatefood', $data['food']) }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">{{ __('food.updateFood') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul id="errors">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form role="form" method="POST" action="{{ route('food.updateSave') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-8">
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ $data['food']->getId() }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('general.name') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="{{ __('general.name') }}" name="name"
                                        value="{{ $data['food']->getName() }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('general.add') }}
                                    {{ __('food.description') }}</label>
                                <div class="col-8">
                                    <textarea cols="40" name="description" class="form-control" spellcheck="true"
                                        value="{{ old('description') }}">{{ $data['food']->getDescription() }}
                                                                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">{{ __('general.avaliable') }}</label>
                                <div class="col-sm-10 col col-lg-2">
                                    @if ($data['food']->getAvailability())
                                        <input type="checkbox" class="col-sm-100" name="availability"
                                            value="{{ old('availability') }}" checked>
                                    @else
                                        <input type="checkbox" class="col-sm-100" name="availability"
                                            value="{{ old('availability') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('general.add') }} {{ __('food.recipe') }}
                                </label>
                                <div class="col-8">
                                    <textarea cols="40" name="recipe" class="form-control" spellcheck="true"
                                        value="{{ old('recipe') }}">{{ $data['food']->getRecipe() }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('general.add') }}
                                    {{ __('general.price') }}</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" placeholder="{{ __('general.price') }}" name="price"
                                        value="{{ $data['food']->getPrice() }}" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-auto">{{ __('general.add') }}
                                    {{ __('ingredients.ingredients') }}</label>
                                @foreach ($data['ingredients'] as $ingredient)

                                    <div class="checkbox">
                                        <label>
                                            <div class="col">

                                                @if (in_array($ingredient->getId(), $data['item']))
                                                    <input type="checkbox" name="ingredients[]"
                                                        value="{{ $ingredient->getId() }}" checked>
                                                    {{ $ingredient->getName() }}
                                                @else
                                                    <input type="checkbox" name="ingredients[]"
                                                        value="{{ $ingredient->getId() }}">
                                                    {{ $ingredient->getName() }}
                                                @endif
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row col-md-auto">
                                <input class="btn btn-primary" type="submit" value="{{ __('general.send') }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <br />
@endsection
