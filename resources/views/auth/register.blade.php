@extends('layouts.main')

@push('styles')
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="container-wrapper">
<!-- Загаловок -->
        <div class="container-wrapper__heading"> 
            <h2 class="title"> Регистрация </h2>
            <p class="text">Заполните форму, чтобы вы могли получить доступ к своей личной учетной записи.</p>
        </div>
<!--Форма регистрации-->
        <div class="forms-registr">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <label  class="forms-title" for="first_name" style="{{ $errors->has('first_name') ? 'color: red' : ''}}"> Имя
                    <input type="text"
                        placeholder="Введите имя"
                        name="first_name"
                        id="name"
                        value="{{ old('first_name') }}"
                        autofocus>
                @error('first_name')
                    <span > {{ $message }}</span>
                @enderror
                </label> <br>
                <label  class="forms-title" for="last_name">
                    Фамилия
                    <input type="text"
                        placeholder="Введите фамилию"
                        name="last_name"
                        id="last_name"
                        value="{{ old('last_name') }}">
                </label> <br>
                <label  class="forms-title" for="email">
                    Email
                    <input type="email"
                        placeholder="Введите почту"
                        name="email"
                        id="email"
                        value="{{ old('email') }}">
                </label> <br>
                <label  class="forms-title" for="password">
                    Пароль
                    <input type="password"
                        placeholder="Введите пароль"
                        name="password"
                        id="password">
                    </label> <br>
                <label  class="forms-title" for="password_confirmation">
                    Подтвердите Пароль
                    <input type="password"
                        placeholder="Введите пароль"
                        name="password_confirmation"
                        id="password_confirmation">
                </label>
        <!--Согласие-->
                <div class="approval">
                    <input class="approval-checkbox" type="checkbox" id="agreement" name="agreement" required>
                    <label  class="approval-title" for="agreement">Я согласен со всеми    <span><a>Условиями</a> </span>  и   <span><a>Политикой конфединциальности</a></span></label><br>
                </div>
            </form>
        </div>
            <div class="account-button">
                <button class="button" type="submit">Создать аккаунт</button>
            </div>
    <!--Авторизация зарегистрировнных пользователей -->
        <div class="authorization">
            <p class="text authorization-text">У вас уже есть аккаунт? <a href="#" src="auth"> Авторизоваться </a></p>
            <p class="text authorization-text">Или войдите с помощью </p>
        </div>
    <!--Варианты авторизации-->
        <div class="authorization-icons">
           <div class="authorization-icons__google" > 
                <a> <img class="img-google" src="img/auth/icons_google.png" alt="google"> </a>
           </div>
            <div class="authorization-icons__vk"> 
                <a> <img class="img-vk"  src="img/auth/icons_vk.png" alt="vk"> </a>
            </div>
        </div>
        </div>
</div>

@endsection
