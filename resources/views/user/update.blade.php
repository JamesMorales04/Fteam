@extends('layouts.app')

@section('title', 'Update user')

@section('content')

@section('header')
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">{{ __('general.update') }} </h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">Website - {{ __('general.update') }} </p>
    </div>
@endsection
{{ Breadcrumbs::render('edituser', $user) }}
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('user.updateUser') }}</div>

                <div class="card-body">

                    @if ($errors->any())

                        <ul id="errors">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    @endif
                    <form role="form" method="POST" action="{{ route('user.updateSave') }}" required>
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="UserId" name="UserId" placeholder="UserId"
                                    value="{{ $user->getId() }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{ __('general.name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre"
                                    value="{{ $user->getName() }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{ __('general.email') }}</label>
                            <div class="col-sm-10">
                                <input type="emailHelp" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ $user->getEmail() }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{ __('general.address') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Direccion" value="{{ $user->getAddress() }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <input type="submit" value={{ __('general.send') }} name="submit"
                                    class="btn btn-primary" />
                            </div>
                        </div>
                    </form>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection
