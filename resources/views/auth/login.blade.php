<!DOCTYPE html>
@extends('auth.layouts.app')

@section('content')
    <style>
        :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
        }

        body {
        background: #007bff;
        background: linear-gradient(to right, #00E633, #33AEFF);
        }

        .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        overflow: hidden;
        }

        .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
        }

        .card-signin .card-img-left {
        width: 45%;
        /* Link to your background image using in the property below! */
        background: scroll center url('/Imagenes/logo_lcc.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        }

        .card-signin .card-body {
        padding: 2rem;
        }

        .form-signin {
        width: 100%;
        }

        .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
        }

        .form-label-group {
        position: relative;
        margin-bottom: 1rem;
        }

        .form-label-group input {
        height: auto;
        border-radius: 2rem;
        }

        .form-label-group>input,
        .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
        color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
        color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
        color: transparent;
        }

        .form-label-group input::-moz-placeholder {
        color: transparent;
        }

        .form-label-group input::placeholder {
        color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
        }

        .btn-google {
        color: white;
        background-color: #ea4335;
        }

        .btn-facebook {
        color: white;
        background-color: #3b5998;
        }

        .background-style {
            background-color:hsl(192, 100%, 75%,0.8);
        }
    </style>
    <title> Iniciar sesión </title>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-warning">{{ Session::get('message') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{$error}}
                                @endforeach
                            </div> 
                        @endif
                        <h5 class="card-title text-center">Acceder</h5>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Ingresar email" value="{{ old('email') }}" required>
                                <label for="inputEmail">Correo Electrónico</label>
                            </div>
                            
                            <hr>
                
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Ingresar contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                
                            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Iniciar sesión') }}</button>
                            <a class="d-block text-center mt-2 small" href="register">{{ __('¿No tienes una cuenta? Regístrate.') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection