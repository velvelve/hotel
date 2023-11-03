@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/verify-email.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="verify-email">

        @if (session('message'))
            <p> {{ session('status') }}</p>
        @endif

        <form class="verify-email__form" action="{{ route('verification.send') }}" method="post">
            @csrf

            <div class="verify-email__logo"></div>
            <div>
                <a class="verify-email__link" href="javascript:history.back()">
                    <span class="verify-email__link-arrow">&lsaquo;</span>Назад
                </a>
                <h1 class="verify-email__title">Пожалуйста, подтвердите почту.</h1>
                <p class="verify-email__text">Отправить письмо для подтверждения снова?</p>
                <button class="verify-email__button" type="submit">Отправить</button>
            </div>
            <div>
                <img class="verify-email__img" src="{{ asset('img\auth\img-verify-email.png') }}" alt="">
            </div>

        </form>
    </section>
@endsection
