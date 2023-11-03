@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/facial-therapy.css') }}" rel="stylesheet">
@endpush

@section('content')

<section class="main">
<!--Баннер с заголовком-->
    <div class="main__header">
        <h1>Массаж лица и головы</h2>
    </div>
<!--Основная часть-->
    <div class="main__content content">
<!--Заголовок-->
        <div class="content__header">
            <h2 class="header_massage">Терапия для лица</h2> 
        </div>
<!--Описание-->
        <div class="content-info">
            <div class="info__text">
                <p class="text">Особый вид массажа, так как голова считается у тайцев священной. Эта процедура поможет снять мышечное напряжение, усталость и раздражение, избавит Вас от головной боли, активизирует рост волос и улучшит их текстуру. Принесет облегчение при простуде и насморке. Мастер прорабатывает подбородок и щеки, глаза и уши, затылок и теменную часть головы, улучшается кровообращение.</p>
                <p class="text">Массаж головы — это ласка для души, которая поможет поддержать тонус кожи лица, тем самым сохраняя молодость. Основные приемы — чередование нежных круговых движений пальцами и сильных нажатий большими пальцами, поглаживание лба и носа, где сконцентрированы важные акупрессурные точки, пощипывание бровей. Массаж головы и лица оживит и придаст энергию, улучшит кровообращение головы, рост и здоровье волос. Он вознесет вас на седьмое небо от наслаждения.Во время массажа лица глаза и уши расслабляются, а чувственное восприятие укрепляется.</p>
            </div>
<!--Изображение-->
            <div class="info__img">
                <img class="img__massage" src="img/facial-therapy/photo1.png" alt="massage">
            </div>
        </div>
</div>
<!--Цены-->
<div class="main__price">
    <div class="price__content">
        <p class="content__text"><b>Стоимость </b><br><b>60 минут</b></p>
        <p class="content__text"><b>Standart</b><br><b>4 500 руб</b></p>
        <p class="content__text"><b>Gold</b><br><b>6 100 руб</b></p>
        <p class="content__text"><b>Premium</b><br><b>8 700 руб </b></p>
    </div>
</div>
<!--Фоновая картинка-->
    <div class="main__img-background">
        <img class="img-background" src="img/facial-therapy/background.png" alt="bachground">
    </div>

</section>

@endsection