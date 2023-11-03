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
                <h2 class="title"> Восстановить пароль </h2>
                <p class="text">Чтобы восстановить пароль необходимо ввести почту,</p>
                <p class="text">которая привязана к вашему аккаунту.</p>
                @if (session('status'))
                    <h3>{{ session('status') }}</h3>
                @endif
            </div>
            <!--Форма восстановления пароля-->
            <form class="forms-auth" action="{{ route('password.request') }}" method="post">
                @csrf
                <label class="forms-title" for="email">
                    Электронная почта
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
                <!--Кнопка-->
                <div class="account-button">
                    <button class="button" type="submit">Отправить письмо</button>
                </div>
            </form>
        </div>
    </div>

@endsection
