@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/restaurants.css') }}" rel="stylesheet">
@endpush

@section('content')

<section class="wrapper">
<div class="section-restaurant">
    <!-- Загаловок-->
    <h1 class="restaurant-heading">Бар и кафе</h1>
    <!-- Первый блок -->
    <div class="section-restaurant-one">
        <!-- Левая часть страницы-->
        <div class="restaurant-info"> 
            <p class="restaurant-text">В баре Cannelle с естественным освещением и сбалансированным сочетанием уюта 
                и оживленности вы найдете гостеприимную атмосферу, а также биокамин, 
                который сделает ваш вечер особенным. Попробуйте наши фирменные блюда, 
                в число которых входят домашние десерты, и напитки из широкого ассортимента, 
                включающего дистиллированные напитки, коктейли, пиво и вино, а также безалкогольные 
                и горячие напитки. Попробуйте наши закуски или выберите блюдо одной из кухонь мира.</p>
                <!-- График работы-->
                <p class="restaurant-text-clock">Часы работы:
                <ul>
                    <li class="restaurant-text-clock-item">• Ежедневно 10:00 - 23:00</li>
                </ul></p>
        </div>
        <!--Правая часть страницы-->
        <div class="restaurant-img">
            <img class="restaurant-img" src="img/restaurants/conferenceroom1.png" alt="bar-cafe">
        </div>
    </div>
    <!-- Загаловок-->
    <h1 class="restaurant-heading">Ресторан Barbazan </h1>
    <!-- Второй блок -->
    <div class="section-restaurant-two">
        <!-- Левая часть страницы-->
        <div class="restaurant-info"> 
            <p class="restaurant-text">В нашем изысканном традиционном ресторане Barbazan вас ожидает 
                ежедневный завтрак (шведский стол). Мы предлагаем безглютеновые продукты и варианты 
                здорового питания, соответствующие диетическим требованиям наших гостей, 
                а также широкий ассортимент горячих и холодных блюд. Это отличное начало дня, 
                посвященного знакомству с Санкт-Петербургом.</p>
                <!-- График работы-->
                <p class="restaurant-text-clock">Часы работы:
                <ul>
                    <li class="restaurant-text-clock-item">• 06:30-10:30 | Завтрак, с понедельника по пятницу</li>
                    <li class="restaurant-text-clock-item">• 06:30-11:00 | Завтрак, суббота и воскресенье, праздничные дни</li>
                </ul>
                </p>
        </div>
        <!--Правая часть страницы-->
        <div class="restaurant-img">
            <img class="restaurant-img" src="img/restaurants/conferenceroom2.png" alt="barbazan">
        </div>
    </div>
    <!-- Загаловок-->
    <h1 class="restaurant-heading">Обслуживание в номере</h1>
    <!-- Третий блок -->
    <div class="section-restaurant-three">
        <!-- Левая часть страницы-->
        <div class="restaurant-info"> 
            <p class="restaurant-text">
                Воспользуйтесь нашей услугой круглосуточного обслуживания номеров 
                в любое время, чтобы подкрепиться. Выберите вкусные блюда из меню и 
                насладитесь ими в комфорте и уединении своего номера или люкса.</p>
                <!-- График работы-->
                <p class="restaurant-text-clock"> Часы работы:
                <ul>
                    <li class="restaurant-text-clock-item">• Круглосуточно | Ежедневно</li>
                </ul>
        </div>
        <!--Правая часть страницы-->
        <div class="restaurant-img">
            <img class="restaurant-img" src="img/restaurants/conferenceroom3.png" alt="roomsrestaurants">
        </div>
    </div>
</div>
</section>
@endsection