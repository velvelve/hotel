@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="register">
        <div class="register__wrapper">

            <div class="register__logo"></div>

            <div>
                <img src="{{ asset('img\auth\img.png') }}" alt="photo-hotel">
            </div>

            <div>
                <h2 class="register__title">Регистрация</h2>
                <p class="register__text">Заполните форму, чтобы вы могли получить доступ к своей личной учетной записи.</p>


                <form class="register__form" action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="register__flex">
                        <div class="register__input-container register__input-container_mod">
                            <label class="register__label" for="first_name"
                                style="{{ $errors->has('first_name') ? 'color: red' : '' }}">Имя</label>
                            <input class="register__input" type="text" placeholder="введите имя" name="first_name"
                                id="first_name" value="{{ old('first_name') }}" autofocus>
                            @error('first_name')
                                <span> {{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="register__input-container register__input-container_mod">
                            <label class="register__label" for="last_name">Фамилия</label>
                            <input class="register__input" type="text" placeholder="Введите фамилию" name="last_name"
                                id="last_name" value="{{ old('last_name') }}">
                        </div>
                    </div>

                    <div class="register__flex">
                        <div class="register__input-container register__input-container_mod">
                            <label class="register__label" for="email">Email</label>
                            <input class="register__input" type="email" placeholder="введите e-mail" name="email" id="email"
                                value="{{ old('email') }}">
                        </div>
    
                        <div class="register__input-container register__input-container_mod">
                            <label class="register__label" for="tel">Номер</label>
                            <input class="register__input" type="tel" placeholder="введите номер телефона" name="tel" id="tel"
                                value="{{ old('tel') }}">
                        </div>
                    </div>

                    <div class="register__input-container">
                        <label class="register__label" for="password">Пароль</label>
                        <input class="register__input" type="password" placeholder="Введите пароль" name="password" id="password">
                    </div>

                    <div class="register__input-container">
                        <label class="register__label" for="password_confirmation">Подтвердите Пароль</label>
                        <input class="register__input" type="password" placeholder="Повторите пароль" name="password_confirmation"
                            id="password_confirmation">
                    </div>

                    <!--Согласие-->
                    <input type="checkbox" id="assent" name="assent" required>
                    <label class="register__assent" for="assent">Я согласен со всеми <a class="register__link"
                            href="#">Условиями</a> и <a class="register__link" href="#">Политикой
                            конфединциальности</a>
                    </label>

                    <button class="register__button" type="submit">Создать аккаунт</button>

                </form>

                <p class="register__ask">У вас уже есть аккаунт?
                    <a class="register__link" href="{{ route('login') }}">
                        Авторизоваться </a>
                </p>

                <p class="register__alternative">Или войдите с помощью </p>

                <div class="register__social">
                    <a class="register__social-link"
                        href="{{ route('social-providers.redirect', ['driver' => 'google']) }}">
                        <img class="img-google" src="img/auth/icons_google.png" alt="google"> </a>

                    <a class="register__social-link"
                        href="{{ route('social-providers.redirect', ['driver' => 'vkontakte']) }}"> <img class="img-vk"
                            src="img/auth/icons_vk.png" alt="vk"> </a>
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
