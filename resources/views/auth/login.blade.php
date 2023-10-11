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
            <h2 class="title"> Войти </h2>
            <p class="text">Войдите, чтобы получить доступ к своей учетной записи.</p>
            @if (session('status'))
                <h3>{{ session('status') }}</h3>
            @endif
        </div>
    <!--Форма авторизации-->
        <form class="forms-auth" action="{{ route('login') }}" method="post">
        @csrf
            <label class="forms-title" for="email">
                Email
                <input type="email"
                    placeholder="Введите почту"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    autofocus>
                @error('email')
                    <span style="color: red"> {{ $message }}</span>
                @enderror
            </label>
            <label class="forms-title" for="password">
                Пароль
                <input type="password"
                       placeholder="Введите пароль"
                        name="password"
                        id="password">
            </label>
        <div class="renember">
            <input class="checkbox" type="checkbox" id="remember" name="remember">
            <label class="forms-text text-renember" for="remember">Запомнить меня</label>
        </div>
        <!--Кнопка-->
        <div class="account-button">
            <button class="button" type="submit">Войти</button>
        </div>
        </form>
        <div class="reset-password">
            <p class="text"><a href="{{ route('password.request') }}" src="auth"> Восстановить пароль </a></p>
        </div>
            <div class="registration">
                <p class="text">У вас нет учетной записи? <a href="{{ route('register') }}" src="auth"> Зарегистрироваться </a></p>
                <p class="text-entrance">Или войдите с помощью </p>
            </div>
     <!--Варианты входа-->
        <div class="entrance-icons">
            <div class="entrance-icons__google" >
                 <a> <img class="img-google" src="img/auth/icons_google.png" alt="google"> </a>
            </div>
            <div class="entrance-icons__vk">
                <a> <img class="img-vk"  src="img/auth/icons_vk.png" alt="vk"> </a>
            </div>
        </div>
    </div>
</div>

@endsection
