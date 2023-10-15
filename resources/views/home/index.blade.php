@extends('layouts.main')

@section('content')
    @include('inc.message')
    <div class="section-1">
        {{-- Хедер главной страницы --}}
        <x-homePageHeader.homePageHeader />
        {{-- Секция 1 главной страницы --}}
        <div class="section-1-social">
            <div class="section-1-social__followUs">
                Follow us
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/instagram.svg"></a>
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/twitter.svg"></a>
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/facebook.svg"></a>
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
        {{-- Поиск --}}
        <div class="section-1-search">
            <x-rooms.search :guests=$guests />
        </div>
        <div class="section-1-services">
            <div class="section-1-services__numbers">
                Элегантные номера
                <img src="/img/homePage/section1/numbers.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__restaurant">
                Ресторан
                <img src="/img/homePage/section1/restaurant.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__spa">
                SPA Place
                <img src="/img/homePage/section1/spa.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__jacuzzi">
                Джакузи
                <img src="/img/homePage/section1/jacuzzi.svg" class="section-1-services__ico">
            </div>
        </div>
    </div>
    {{-- Секция 2 главной страницы --}}
    <div class="section-2">
        <x-slider.slider :rooms=$rooms />
        <div class="services">
            @foreach ($hotel->services as $service)
                <div class="services-item">
                    <img src="{{ $service->icon()->path }}" alt="{{ $service->icon()->filename }}" class="item-ico">
                    <div class="item-description">
                        {{ $service->name }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="service-carts">
            <x-serviceCart.serviceCart />
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
    {{-- Секция 3 главной страницы --}}
    <div class="section-3">
        <div class="section-3-carts">
            <x-section3Cart.section3Cart />
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/hot-stones.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Горячие камни
                </div>
                <div class="section-3-carts__item-description">
                    Расслабьтесь, восстановите силы и избавьтесь от стресса с помощью нашей роскошной услуги массажа
                    горячими камнями.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/face-therapy.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Терапия для лица
                </div>
                <div class="section-3-carts__item-description">
                    Откройте для себя свое естественное сияние и подарите молодую, обновленную кожу с помощью нашей
                    омолаживающей терапии для лица.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/cosmetic-procedures.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Косметические процедуры
                </div>
                <div class="section-3-carts__item-description">
                    Окунитесь в мир красоты и подчеркните свою естественную красоту с помощью наших изысканных косметических
                    процедур.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Секция 4 главной страницы --}}
    <div class="section-4">
        <div class="section-4-top">
            <div class="section-4-top__description">
                <div class="section-4-top__description-upperTitle">The Luxury hotel</div>
                <div class="section-4-top__description-downTitle">Лучший отель для тебя.</div>
                <div class="section-4-top__description-upperText">
                    LUXURY HOTEL - роскошный 5-звездочный отель, скрытая жемчужина, где есть возможность уединиться и
                    отдохнуть в элегантной обстановке.
                </div>
                <div class="section-4-top__description-downText">
                    «ВЕЛИКОЛЕПНОЕ РАСПОЛОЖЕНИЕ, ПРОСТОРНЫЕ НОМЕРА, ПЕРВОКЛАССНОЕ ОБСЛУЖИВАНИЕ — ОТЕЛЬ LUXURY HOTEL ПОКОРЯЕТ
                    СЕРДЦА НАВСЕГДА»
                </div>
            </div>
            <div class="section-4-top__img">
                <img src="/img/homePage/section4/section4-hotel.png">
            </div>
        </div>
        <div class="section-4-bottom">
            <div class="section-4-subscription">
                <div class="section-4-subscription__title">
                    Будь в курсе последних новостей
                    <div class="section-4-subscription__subscribeText">
                        Подпишись на нашу рассылку
                    </div>
                </div>
                <form action="#" class="section-4-subscription__form">
                    <div class="section-4-subscription__input">
                        <input type="text" placeholder="Введите Email-адрес" />
                    </div>
                    <button class="section-4-subscription__btn">ПОДПИСАТЬСЯ</button>
                </form>
            </div>
        </div>
    </div>
    @push('styles')
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/homePage/home.css') }}" rel="stylesheet">
    @endpush
@endsection
