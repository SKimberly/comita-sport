@extends('layouts.principal')
@section('saludo')
<div class="col-md-6 animate__animated animate__fadeInDown ">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" class="shadow rounded py-3 px-4 was-validated comita-jaspeado">
        @csrf
        <h6 class="text-white"><strong> RESETEAR CONTRASEÑA </strong></h6><hr class="linea-blanca">
        <div class="form-group row">
            <label for="email" class="col-md-4 text-white col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
            <div class="col-md-8">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder="Ingrese su email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0 pb-2">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-outline-light btn-sm btn-comita">
                    {{ __('Enviarme el link de reseteo de clave') }}
                </button>
            </div>
        </div>
        <hr class="linea-blanca">
        <div class="form-group row">
            <div class="col-sm-6 pb-2">
                <a href="{{ route('login') }}" class="btn btn-sm btn-block  btn-outline-light">{{ __('¿Ya tienes cuenta?') }}</a>
            </div>
            <div class="col-sm-6 pb-2">
                <a class="btn btn-block btn-sm btn-outline-light" href="{{ route('register') }}">
                    {{ __('¿NO tienes cuenta?') }}
                </a>
            </div>
        </div>
    </form>
</div>
@endsection