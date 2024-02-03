@extends('layouts.app')

@section('content')
<div class="container m-auto pb-50px">
    <div class="row justify-content-center">
        <div class="col-md-8 h-100">
            <div class="card shadow rounded-4">
                <div class="card-header bg-transparent py-3">
                    <div class="row">
                        <h3 class="text-center">
                            {{'Вход в личный кабинет'}}
                        </h3>
                    </div>
                </div>

                <div class="card-body py-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-7 col-12">
                                <fieldset class="border border-1 rounded-2">
                                    <legend class="ms-3" style="all: revert;">Email</legend>

                                    <div class="w-100 h-100">
                                        <input id="email" type="email" style="box-shadow: none;" class="form-control @error('email') is-invalid @enderror border-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-7 col-12">
                                <fieldset class="border border-1 rounded-2">
                                    <legend class="ms-3" style="all: revert;">Пароль</legend>

                                    <div class="w-100 h-100">
                                        <input id="password" type="password" style="box-shadow: none;" class="form-control @error('password') is-invalid @enderror border-0" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row mb-5 justify-content-center">
                            <div class="col-md-7 col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Запомнить меня
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-7 col-12 row justify-content-center">
                                <div class="col-6 p-0">
                                    <button type="submit" class="btn btn-green w-100">
                                        {{'Войти'}}
                                    </button>
                                </div>
                                <div class="col-6 d-flex justify-content-end">

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-green" href="{{ route('password.request') }}">
                                            {{'Забыли пароль?'}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
