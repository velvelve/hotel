@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/login.css') }}" rel="stylesheet">
@endpush

@section('content')
    @include('includes.message')

    <section class="login">

        <div class="login__wrapper">

            <div class="login__logo"></div>

            <div>
                <h2 class="login__title">Вход</h2>
                <p class="login__text">Войдите, чтобы получить доступ к своей учетной записи</p>

                @if (session('status'))
                    <h3>{{ session('status') }}</h3>
                @endif


                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="login__input-container">
                        <label class='login__label' for="email">Email</label>
                        <input class='login__input' name="email" id="email" type='email' value="{{ old('email') }}"
                            placeholder="введите e-mail" autofocus>
                        @error('email')
                            <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="login__input-container">
                        <label class='login__label' for="password">Password</label>
                        <input class='login__input' name="password" id="password" type='password'
                            placeholder="Введите пароль">
                    </div>

                    <div class="login__flex">
                        <div class="login__renember">
                            <input type="checkbox" id="remember" name="remember">
                            <label class="login__renember-label" for="remember">запомнить</label>
                        </div>

                        <div>
                            <a class="login__link" href="{{ route('password.request') }}">забыли пароль</a></p>
                        </div>
                    </div>

                    <button class="login__button" class="button" type="submit">Войти</button>
                </form>


                <p class="login__ask">У вас нет учетной записи?
                    <a class="login__link" href="{{ route('register') }}">
                        Зарегистрироваться </a>
                </p>

                <p class="login__alternative">Или войдите с помощью </p>

                <div class="login__social">
                    <a class="login__social-link" href="{{ route('social-providers.redirect', ['driver' => 'google']) }}">
                        <img class="img-google" src="img/auth/icons_google.png" alt="google"> </a>

                    <a class="login__social-link"
                        href="{{ route('social-providers.redirect', ['driver' => 'vkontakte']) }}"> <img class="img-vk"
                            src="img/auth/icons_vk.png" alt="vk"> </a>
                </div>

            </div>

            <div>
                <img class="login__img" src="{{ asset('img\auth\img.png') }}" alt="photo-hotel">
            </div>

        </div>



        </div>
        </div>
    @endsection
