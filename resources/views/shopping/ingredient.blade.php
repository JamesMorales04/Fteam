@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ingredient list</h1>
        <ul>
            <br />
            <div class="card">
                <div class="card-header">
                    {{ $data['food']->getName() }}
                </div>

                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('shop.addIngredient') }}">
                        
                            <b>
                                <div class="col-auto">
                                    
                                    {{ Form::select('ingredient[]', $data['name'], $data['name'], ['multiple' => 'true']) }}
                                </div> <br />
                            </b>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{ old('name') }}" />
                                </div>
                            </div>

                        <div class="form-group row col-md-auto">
                            <input class="btn btn-primary" type="submit" value="{{ __('messages.AddCart') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </ul>
    </div>
@endsection
