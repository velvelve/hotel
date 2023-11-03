@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/massage.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div class="massage-main">
            <img class="massage-img-main" src="img/massage/main.png" alt="massage">
            <h1 class="massage-title">Виды массажа The Luxury Hotel</h1>
        </div>
<section class="wrapper">
    <div class="section-massage">
        <div class="massage-one">
            <div class="massage-info"> 
                <h1 class="massage-heading">Традиционный тайский массаж</h1>
                <p class="massage-text">Традиционный тайский массаж известен под несколькими названиями: 
                    тайский массаж, тайская йога, «нуат пэн боран», пассивная йога и другие. 
                    По своей сути этот массаж состоит из двух составляющих, умело объединенных в одно целое. 
                    Это акупрессура – воздействие на проблемные места через давление на определённые точки 
                    тела и совокупность упражнений, позаимствованных из практики йогов, таких 
                    как скручивания и растяжки.
                </p>
                <div class="massage-pricelist">
                    <div class="massage-price">
                        <h1 class="massage-price-text">Стоимость 
                            <br>
                            120 минут
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Standart 
                            <br>
                            4 100 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Gold 
                            <br>
                            7 800 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Premium 
                            <br>
                            9 600 руб
                        </h1>
                    </div>
                </div>
            </div>
            <div class="massage-img-info">
                <img class="massage-img" src="img/massage/massage1.png" alt="massage1">
            </div>
        </div>
        <div class="massage-two">
            <div class="massage-img-info">
                <img class="massage-img2" src="img/massage/massage2.png" alt="massage2">
            </div>
            <div class="massage-info"> 
                <h1 class="massage-heading">Энергия жизни</h1>
                <p class="massage-text">Энергия жизни — это тайский массаж всего тела в сочетании 
                    с массажем ног. Тайский массаж подарит вашему телу чувство расслабленности и 
                    легкости, а отдельная работа с ногами доставит массу удовольствия и усилит 
                    расслабляющий эффект — поможет максимально быстро и на длительное время 
                    избавиться от физического и эмоционального напряжения.
                </p>
                <div class="massage-pricelist">
                    <div class="massage-price">
                        <h1 class="massage-price-text">Стоимость 
                            <br>
                            120 минут
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Standart 
                            <br>
                            6 500 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Gold 
                            <br>
                            8 100 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Premium 
                            <br>
                            10 900 руб
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="massage-three">
            <div class="massage-info"> 
                <h1 class="massage-heading">Массаж горячими травяными мешочками</h1>
                <p class="massage-text">
                    Активные зоны тела массируются нагретыми травяными сборами, благодаря 
                    чему улучшается циркуляция крови, повышается мышечный тонус. Тайские 
                    травы обладают хорошим проникающим действием. Массаж оказывает глубокое 
                    расслабляющее, прогревающее и оздоравливающее воздействие, быстро 
                    восстанавливает организм после болезни, стрессов или физических нагрузок.
                </p>
                <div class="massage-pricelist">
                    <div class="massage-price">
                        <h1 class="massage-price-text">Стоимость 
                            <br> 
                            120 минут
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Standart 
                            <br>
                            6 500 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Gold 
                            <br>
                            7 900 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Premium 
                            <br>
                            11 300 руб
                        </h1>
                    </div>
                </div>
            </div>
            <div class="massage-img-info">
                <img class="massage-img" src="img/massage/massage3.png" alt="massage3">
            </div>
        </div>
        <div class="massage-four">
            <div class="massage-img-info">
                <img class="massage-img2" src="img/massage/massage4.png" alt="massage4">
            </div>
            <div class="massage-info"> 
                <h1 class="massage-heading">Арома-массаж с горячим маслом</h1>
                <p class="massage-text">Арома-oil массаж с горячим маслом – это 100% релакс и очень 
                    приятная процедура. Разогретое масло в чутких руках мастера наполнит ваше тело энергией тепла. 
                    Также, как и традиционный арома-oil массаж, он выполняется с натуральными ароматными тайскими маслами, 
                    плавными движениями, с мягкими надавливаниями и растираниями. Эффективно увлажняет, питает и 
                    тонизирует кожу. Идеально для периода осенних и зимних холодов.
                </p>
                <div class="massage-pricelist">
                    <div class="massage-price">
                        <h1 class="massage-price-text">Стоимость 
                            <br> 
                            120 минут
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Standart 
                            <br>
                            9 500 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Gold 
                            <br>
                            11 100 руб
                        </h1>
                    </div>
                    <div class="massage-price">
                        <h1 class="massage-price-text">Premium 
                            <br> 
                            18 000 руб
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection