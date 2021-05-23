@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ingredient list</h1>
        <ul> <br />
            <div class="card">
                <div class="card-header">
                    {{ $data['food']->getName() }}
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('shop.modifyIngredients') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-auto">{{ __('ingredients.modifyIngredients') }} </label>
                            @foreach ($data['ingredients'] as $ingredient)

                            <div class="form-group row">
                                <div class="col-8">
                                    <input type="hidden" class="form-control" name="id"
                                        value="{{ $data['food']->getId() }}" />
                                </div>
                            </div>

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
                            <input class="btn btn-primary" type="submit" value= {{ __('general.send') }}/>
                        </div>
                    </form>
                </div>
            </div>
         </ul>
    </div>
@endsection
