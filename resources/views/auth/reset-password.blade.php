@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="container-wrapper">
            <!-- Загаловок -->
            <div class="container-wrapper__heading">
                <h2 class="title">Изменение пароля </h2>
            </div>
            <!--Форма восстановления пароля-->
            <form class="forms-auth" action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $request->token }}">
                <label class="forms-title" for="email">
                    Email
                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email', $request->email) }}">
                    @error('email')
                    <span style="color: red"> {{ $message }}</span>
                    @enderror
                </label>
                <label class="forms-title" for="password">
                    Новый пароль
                    <input type="password"
                           placeholder="Введите новый пароль"
                           name="password"
                           id="password"
                           autofocus>
                    @error('email')
                    <span style="color: red"> {{ $message }}</span>
                    @enderror
                </label>
                <label class="forms-title" for="password_confirmation">
                    Повторите пароль
                    <input type="password"
                           placeholder="Введите пароль"
                           name="password_confirmation"
                           id="password_confirmation">
                </label>
                <!--Кнопка-->
                <div class="account-button">
                    <button class="button" type="submit">Изменить пароль</button>
                </div>
            </form>
        </div>
    </div>

@endsection
