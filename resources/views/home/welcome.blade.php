@extends('layouts.main')

@section('content')
    @include('inc.message')
    <div class="main-container">
        <div class="section-1">
            <div class="section-1-header">
                <div class="section-1-header__logo">
                    <div class="section-1-header__logo-bg">
                        <div class="section-1-header__logo-upperText">LUXURY</div>
                        <div class="section-1-header__logo-lowerText">HOTELS</div>
                    </div>
                </div>
                <div class="section-1-header__menu">
                    <ul>
                        <li><a href="#">Главная</a></li>
                        <li><a href="{{ route('rooms.types') }}">Номера</a></li>
                        <li><a href="{{ route('contacts.index') }}">Контакты</a></li>
                        @auth
                            <li><a href="{{ route('profile') }}">Профиль</a></li>
                            <li><a href="{{ route('logout') }}">Выйти</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="section-1-welcomeText">
                <div class="section-1-welcomeText__welcome">
                    Добро пожаловать!
                </div>
                <div class="section-1-welcomeText__name-hotel">
                    <div class="section-1-welcomeText__name-hotel-top">
                        The Luxury hotel
                    </div>
                    <div class="section-1-welcomeText__name-hotel-bottom">
                        Resort & Spa Hotel
                    </div>
                </div>
            </div>
            <div class="section-1-search">
                <x-rooms.search :guests=$guests />
            </div>
        </div>
        <div class="section-2">
            <div class="slider">
                <a class="slider-btn">
                    <img src="/img/section2/polygon-left.svg" class="slider-btn-img">
                </a>
                <!-- Загрузка номеров -->
                <div class="slider-cart">
                    <!-- Загрузка изображения -->
                    <img src="/img/section2/cart-img.png" class="cart-img" />
                    <div class="slider-cart-description">
                        <div class="description-wrapper">
                            <!-- Загрузка уровня номера -->
                            <div class="description-level">Номер STANDART</div>
                            <!-- Загрузка верхнего описания -->
                            <div class="description-upperText">18 m2 | 1 кровать Queen | 2 взрослых, 1 ребенок (0-11 лет)
                            </div>
                            <!-- Загрузка иконок -->
                            <div class="description-icons">
                                <img src="/img/section2/slippers.svg" class="description-ico">
                                <img src="/img/section2/kettle.svg" class="description-ico">
                                <img src="/img/section2/wifi.svg" class="description-ico">
                            </div>
                            <!-- Загрузка нижнего описания -->
                            <div class="description-lowerText">В номерах Standart есть все необходимое для комфортного
                                пребывания и спокойного сна.</div>
                        </div>
                    </div>
                </div>
                <div class="slider-cart">
                    <!-- Загрузка изображения -->
                    <img src="/img/section2/cart-img.png" class="cart-img" />
                    <div class="slider-cart-description">
                        <div class="description-wrapper">
                            <!-- Загрузка уровня номера -->
                            <div class="description-level">Номер SUPERIOR</div>
                            <!-- Загрузка верхнего описания -->
                            <div class="description-upperText">23 m2 | 2 кровати TWIN или 1 кровать Queen
                                | 2 взрослых, 1 ребенок (0-11 лет)</div>
                            <!-- Загрузка иконок -->
                            <div class="description-icons">
                                <img src="/img/section2/slippers.svg" class="description-ico">
                                <img src="/img/section2/kettle.svg" class="description-ico">
                                <img src="/img/section2/wifi.svg" class="description-ico">
                                <img src="/img/section2/tv.svg" class="description-ico">
                                <img src="/img/section2/hair-dryer.svg" class="description-ico">
                            </div>
                            <!-- Загрузка нижнего описания -->
                            <div class="description-lowerText">Если вам необходим дополнительный комфорт, забронируйте номер
                                Superior. В этом номере есть все, что вам нужно.</div>
                        </div>
                    </div>
                </div>
                <div class="slider-cart">
                    <!-- Загрузка изображения -->
                    <img src="/img/section2/cart-img.png" class="cart-img" />
                    <div class="slider-cart-description">
                        <div class="description-wrapper">
                            <!-- Загрузка уровня номера -->
                            <div class="description-level">Номер PREMIUM</div>
                            <!-- Загрузка верхнего описания -->
                            <div class="description-upperText">30 m2 | 2 кровати TWIN или 1 кровать Queen
                                | 2 взрослых, 1 ребенок (0-11 лет)</div>
                            <!-- Загрузка иконок -->
                            <div class="description-icons">
                                <img src="/img/section2/slippers.svg" class="description-ico">
                                <img src="/img/section2/kettle.svg" class="description-ico">
                                <img src="/img/section2/wifi.svg" class="description-ico">
                                <img src="/img/section2/tv.svg" class="description-ico">
                                <img src="/img/section2/hair-dryer.svg" class="description-ico">
                                <img src="/img/section2/safe.svg" class="description-ico">
                            </div>
                            <!-- Загрузка нижнего описания -->
                            <div class="description-lowerText">Наши номера Premium подойдут тем, кто любит просторные
                                помещения и дополнительный комфорт.</div>
                        </div>
                    </div>
                </div>
                <a class="slider-btn">
                    <img src="/img/section2/polygon-right.svg" class="slider-btn-img">
                </a>
            </div>
            <div class="services">
                <div class="services-item">
                    <img src="/img/section2/swim.svg" class="item-ico">
                    <div class="item-description">
                        Бассейн
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/fitness.svg" class="item-ico">
                    <div class="item-description">
                        Фитнес
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/restaurant.svg" class="item-ico">
                    <div class="item-description">
                        Ресторан
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/transfer.svg" class="item-ico">
                    <div class="item-description">
                        Трансфер
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/support.svg" class="item-ico">
                    <div class="item-description">
                        Поддержка
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/spa.svg" class="item-ico">
                    <div class="item-description">
                        Spa
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/wifi2.svg" class="item-ico">
                    <div class="item-description">
                        Wifi
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/parking.svg" class="item-ico">
                    <div class="item-description">
                        Паркинг
                    </div>
                </div>
                <div class="services-item">
                    <img src="/img/section2/service.svg" class="item-ico">
                    <div class="item-description">
                        Сервис
                    </div>
                </div>
            </div>
            <div class="service-carts">
                <div class="service-cart-1">
                    <div class="service-cart-description">
                        В нашем кафе вы можете не только вкусно поесть, но и просто приятно провести время
                    </div>
                </div>
                <div class="service-cart-2">
                    <div class="service-cart-description">
                        Расслабся в чистейшем бассейне с теплой водой и функцией гидромассажа
                    </div>
                </div>
                <div class="service-cart-3">
                    <div class="service-cart-description">
                        Попробуете стоун-терапию, скрабы, маски и обёртывания
                    </div>
                </div>
                <div class="service-cart-4">
                    <div class="service-cart-description">
                        Проведи время с пользой для тела в нашем новом тренажерном зале!
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/section1/section1.css') }}" rel="stylesheet">
        <link href="{{ asset('css/section2/section2.css') }}" rel="stylesheet">
    @endpush
@endsection
