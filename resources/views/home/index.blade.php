@extends('layouts.main')

@section('content')
    @include('includes.message')
    <div class="section-1">
        {{-- Хедер главной страницы --}}
        <div class="section-1-header">
            <div class="section-1-header__logo">
                <a href="{{ route('home') }}">
                    <div class="section-1-header__logo-bg">
                        <div class="section-1-header__logo-upperText">LUXURY</div>
                        <div class="section-1-header__logo-lowerText">HOTELS</div>
                    </div>
                </a>
            </div>
            <div class="section-1-header__menu">
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
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
        {{-- Слайдер --}}
        <div class="slider"
            style="display: flex; justify-content: space-between; align-items: center; width: 1400px; margin-top: 120px">
            <div class="slider-btn-prev" style="height: 30px; cursor: pointer">
                <img src="img/homePage/section2/slider-btn-left.svg" />
            </div>
            <div class="swiper" style="width: 1274px; height: 650px">
                <div class="swiper-wrapper">
                    {{-- Слайды --}}
                    @foreach ($rooms as $room)
                        <div class="swiper-slide" style="max-width: 390px">
                            <a href="{{ route('rooms.types') }}" class="slider-route">
                                <div class="slider-cart">
                                    <img src="{{ $room->images[0] }}" class="cart-img" />
                                    <div class="slider-cart-description">
                                        <div class="description-wrapper">
                                            <div class="description-level">Номер {{ $room->roomTypeName }}</div>
                                            <div class="description-upperText" style="white-space: pre-line;">
                                                Ценовой дипапазон: {{ $room->getPriceRange() }}
                                                Площади: {{ $room->getAreaRange() }}
                                                Количество гостей: {{ $room->getGuestCountRange() }}
                                                Доступные виды из окна: {{ $room->viewTypeDescriptions }}
                                                Доступные типы кроватей: {{ $room->bedTypeDescriptions }}
                                            </div>
                                            <div class="description-icons">
                                                @foreach ($room->includedServices as $service)
                                                    <div class="description-icon-container">
                                                        <img src="{{ $service->icon[0]->path }}" class="description-ico">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="description-lowerText">{{ $room->roomTypeDescription }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="slider-btn-next" style="height: 30px; cursor: pointer">
                <img src="img/homePage/section2/slider-btn-right.svg" />
            </div>
        </div>

        <div class="services">
            @foreach ($hotel->services as $service)
                <div class="services-item">
                    <img src="{{ $service->icon[0]->path }}" alt="{{ $service->icon[0]->filename }}" class="item-ico">
                    <div class="item-description">
                        {{ $service->name }}
                    </div>
                </div>
            @endforeach
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
    {{-- Секция 3 главной страницы --}}
    <div class="section-3">
        <div class="section-3-carts">
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/massage.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Массаж
                </div>
                <div class="section-3-carts__item-description">
                    Побалуйте себя роскошным массажем в Luxury hotel. Приглашаем вас отдохнуть, расслабиться и
                    восстановить
                    силы.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
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
                    Окунитесь в мир красоты и подчеркните свою естественную красоту с помощью наших изысканных
                    косметических
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
                    «ВЕЛИКОЛЕПНОЕ РАСПОЛОЖЕНИЕ, ПРОСТОРНЫЕ НОМЕРА, ПЕРВОКЛАССНОЕ ОБСЛУЖИВАНИЕ — ОТЕЛЬ LUXURY HOTEL
                    ПОКОРЯЕТ
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
        <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    @endpush
@endsection

<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: false,

        slidesPerView: 3,
        spaceBetween: 53,
        navigation: {
            nextEl: '.slider-btn-next',
            prevEl: '.slider-btn-prev',
        }
    });
</script>
