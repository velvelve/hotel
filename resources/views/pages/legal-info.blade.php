@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/legal-info.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="wrapper">
<!-- Левая часть страницы-->
    <section class="left-wrapper">
        <div class="content">
<!-- Загаловок-->
            <h1>Юридическая информация</h1>
<!-- Блок с правовой информацией-->
            <h2 class="text">The Luxury Hotel Belgium SRL/BV</h2>
<!-- Почтовый адрес-->
            <div>
                <h3 class="text">Почтовый адрес</h3>
                <p class="text">The Luxury Hotel Hospitality <br>г. Москва, ул. Никольская, 123</p>
            </div>
<!-- Представители-->
            <div>
                <h3 class="text">Представители</h3>
                <p class="text">Официальный представитель: Федерико Гонсалес (Federico J. González), президент и генеральный директор<br>Ответственный за материалы: Рауль Альварес Баррера (Raul Alvarez Barrera), вице-президент по цифровым технологиям</p>
            </div>
<!-- регистрация-->
            <div>
                <h3 class="text">Регистрация коммерческой организации</h3>
                <p class="text">Компания The Luxury Hotel Hospitality г. Москва, ул. Никольская, 123 зарегистрирована в России как коммерческая организация с номером плательщика НДС 0442.832.318.</p>
            </div>
                <!-- Телефон-->
            <div class="phone">
                <h3 class="text">Телефон</h3>
                <p class="text text-phone">+7-800-800-88-80</p>
            </div>
<!--Связь-->
            <div>
                <h3 class="text">Свяжитесь с нами:</h3>
                <p class="text">Для уточнения деталей вы можете связаться с намии по электронному адресу info@luxury_hotel.ru </p>
            </div>
        </div>
    </section>
<!--Правая часть страницы-->
    <section class="right-wrapper">
        <img class="img" src="img/legal-info/img.png" alt="">
    </section>
</section>

@endsection