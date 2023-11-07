@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/forgot-password.css') }}" rel="stylesheet">
@endpush

@section('content')
  
    <section class="forgot-password">

        <div class="forgot-password__wrapper">

            <div class="forgot-password__logo"></div>

            <div class="container-wrapper">
                <!-- Загаловок -->
                <div class="container-wrapper__heading">
                    <h2 class="forgot-password__title"> Восстановить пароль </h2>
                    <p class="forgot-password__text">Чтобы восстановить пароль необходимо ввести почту,</p>
                    <p class="forgot-password__text">которая привязана к вашему аккаунту.</p>
                    @if (session('status'))
                        <h3>{{ session('status') }}</h3>
                    @endif
                </div>
                <!--Форма восстановления пароля-->
                <form class="forms-auth" action="{{ route('password.request') }}" method="post">
                    @csrf
                    <div class="forgot-password__input-container">
                        <label class='forgot-password__label' for="email">Электронная почта</label>
                            <input class="forgot-password__input" type="email"
                                placeholder="Введите почту"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                autofocus>
                    </div>
                        @error('email')
                        <span style="color: red"> {{ $message }}</span>
                        @enderror
                    </label>
                    <!--Кнопка-->
                    <div class="account-button">
                        <button class="forgot-password__button" class="button" type="submit">Отправить письмо</button>
                    </div>
                </form>
            </div>

            <div>
                <img class="forgot-password__img" src="{{ asset('img\auth\img.png') }}" alt="photo-hotel">
            </div>

        </div>
    </section>
@endsection
