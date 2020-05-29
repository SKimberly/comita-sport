@extends('layouts.principal')

@section('saludo')
<div class="col-md-6 animate__animated animate__fadeInDown">
    <form class="shadow rounded py-3 px-4 was-validated comita-jaspeado" method="POST" action="{{ route('register') }}">
    @csrf
    <h6 class="text-white"><strong> REGISTRO </strong></h6><hr class="linea-blanca">
        <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="name" type="text" class="form-control bg-light shadow-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre Completo">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input id="cedula" type="text" class="form-control bg-light shadow-sm @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" placeholder="Cedula de Identidad">

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        </div>
            <div class="form-group row">
                           <div class="col-sm-6">
                                <input id="telefono" type="text" class="form-control bg-light shadow-sm @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" placeholder="Telefono">

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input id="email" type="email" class="form-control bg-light shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo electronico">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            </div>
                <div class="form-group row">
                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control bg-light shadow-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                    <div class="col-sm-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita su contraseña">
                    </div>
                </div>
                <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-block btn-sm btn-comita btn-outline-light">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                </div>
                <hr class="linea-blanca">
                    <div class="form-group row pb-2">
            <div class="col-sm-6 pb-2">
                <a href="{{ route('login') }}" class="btn btn-block  btn-outline-light btn-sm">{{ __('¿Ya tienes cuenta?') }}</a>
            </div>
            <div class="col-sm-6 pb-2">
                @if (Route::has('password.request'))
                    <a class="btn btn-block  btn-outline-light btn-sm" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
                    </div>
    </form>
</div>
@endsection
