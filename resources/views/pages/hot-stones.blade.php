@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/hot-stones.css') }}" rel="stylesheet">
@endpush

@section('content')

<section class="main">
<!--Баннер с заголовком-->
    <div class="main__header">
        <h1>Массаж горячими камнями</h2>
    </div>
<!--Основная часть-->
    <div class="main__content ">
<!--Заголовок-->
        <div class="content__header">
            <h2 class="header_stones">Расслабляющая процедура с прикосновением живых горячих камней. </h2> 
        </div>
<!--Описание-->
        <div class="content-info">
            <div class="info__text">
                <p class="text">Массаж камнями, – это бесконечно приятная процедура. Прикосновение живого камня многие характеризуют как ласкающую и очень расслабляющую процедуру, утверждая, что более глубокого и проникающего действия им не приходилось испытывать раньше. Использование природных камней гарантирует не только эффективность процедуры, но и полную степень релаксации. Служа продолжением руки мастера, камни усиливают эффект массажа, являясь настоящей «гимнастикой» для сосудов.</p>
                <p class="text">Эффекты процедуры: усиление обмена веществ, регуляция работы вегетативной нервной системы, активизация эндокринной и иммунной систем.</p>
            </div>
<!--Изображение-->
            <div class="info__img">
                <img class="img__massage" src="img/hot-stones/photo1.png" alt="massage">
            </div>
        </div>
<!--Цены-->
    <div class="main__price">
        <p class="price__text"><b>Стоимость </b><br><b>120 минут</b></p>
        <p class="price__text"><b>Standart</b><br><b>9 500 руб</b></p>
        <p class="price__text"><b>Gold</b><br><b>11 100 руб</b></p>
        <p class="price__text"><b>Premium</b><br><b>18 000 руб </b></p>
    </div>
</div>
<!--Фоновая картинка-->
    <div class="main__img-background">
        <img class="img-background" src="img/hot-stones/background.png" alt="bachground">
    </div>

</section>

@endsection