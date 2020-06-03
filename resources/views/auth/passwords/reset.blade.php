@extends('layouts.principal')
@section('saludo')
<div class="col-md-6 animate__animated animate__fadeInDown ">
    <form method="POST" action="{{ route('password.update') }}" class=" shadow rounded py-3 px-4 comita-jaspeado ">
        @csrf
        <h6 class="text-white"><strong> RESTABLECIMIENTO DE CONTRASEÑA </strong></h6><hr class="linea-blanca">
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('Correo electrónico') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Contraseña') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">{{ __('Repita contraseña') }}</label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn  btn-outline-light btn-comita">
                    {{ __('Resetear Contraseña') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection