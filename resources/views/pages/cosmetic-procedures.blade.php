@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/cosmetic-procedures.css') }}" rel="stylesheet">
@endpush

@section('content')
        <div class="cosmetic-procedures-main">
            <img class="cosmetic-procedures-img-main" src="img/cosmetic-procedures/main3.png" alt="cosmetic-procedures">
            <h1 class="cosmetic-procedures-title">Косметические процедуры</h1>
        </div>
<section class="wrapper">
    <div class="section-cosmetic-procedures">
        <div class="cosmetic-procedures-one">
            <div class="cosmetic-procedures-info"> 
                <h1 class="cosmetic-procedures-heading">«Морской бриз»</h1>
                <p class="cosmetic-procedures-text">«Морской бриз» создан для тех, кто любит уход, основанный на 
                    самых натуральных компонентах, подаренных самой природой….
                    Натуральная морская соль богата натрием, магнием и другими минералами, которые 
                    поддержат водный баланс, обновляя кожу, отшелушивая и минерализируя ее. На ваш выбор 
                    предлагается пудровое обертывание из ламинарии и фукуса – морских водорослей, которые 
                    максимально эффективно увлажняют, подтягивают кожу, убирают и снимают отечность в верхних 
                    слоях эпидермиса или винное обертывание anti-age с экстрактом косточки винограда из серии Marakott.
                </p>
                <div class="cosmetic-procedures-pricelist">
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Стоимость 
                            <br>
                            120 минут
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Standart 
                            <br>
                            9 700 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Gold 
                            <br>
                            10 900 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Premium 
                            <br>
                            13 600 руб
                        </h1>
                    </div>
                </div>
            </div>
            <div class="cosmetic-procedures-img-info">
                <img class="cosmetic-procedures-img" src="img/cosmetic-procedures/cosmetic-procedures1.png" alt="cosmetic-procedures1">
            </div>
        </div>
        <div class="cosmetic-procedures-two">
            <div class="cosmetic-procedures-img-info">
                <img class="cosmetic-procedures-img2" src="img/cosmetic-procedures/cosmetic-procedures2.png" alt="cosmetic-procedures2">
            </div>
            <div class="cosmetic-procedures-info"> 
                <h1 class="cosmetic-procedures-heading">«Кофе со сливками»</h1>
                <p class="cosmetic-procedures-text">«Кофе со сливками» создан для тех, кто любит уход, основанный на 
                    самых натуральных компонентах, подаренных самой природой. Свежий кофе и сливки в 
                    сочетании с заботой тайских мастеров подарят Вашему телу легкость и обновление…
                    Кофейный сахарный скраб бережно работает с верхними слоями эпидермиса, полностью 
                    обновляя и увлажняя его. Кофе обладает моделирующим эффектом – благодаря высокому 
                    содержанию кофеина улучшается кровоток, выводятся шлаки, и достигается эффект лифтинга. 
                </p>
                <div class="cosmetic-procedures-pricelist">
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Стоимость 
                            <br>
                            120 минут
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Standart 
                            <br>
                            9 700 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Gold 
                            <br>
                            11 900 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Premium 
                            <br>
                            13 800 руб
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="cosmetic-procedures-three">
            <div class="cosmetic-procedures-info"> 
                <h1 class="cosmetic-procedures-heading">«Сияние молодости»</h1>
                <p class="cosmetic-procedures-text">
                    Процедура ухода за лицом, включающая очищение и массаж с питательным кремом, избавляет 
                    от токсинов, питает кожу и разглаживает морщины. Для ухода используется одна из 
                    косметических линий «Жасмин» или «Вино», на ваш вкус.
                </p>
                <div class="cosmetic-procedures-pricelist">
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Стоимость 
                            <br> 
                            120 минут
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Standart 
                            <br>
                            5 700 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Gold 
                            <br>
                            7 900 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Premium 
                            <br>
                            9 800 руб
                        </h1>
                    </div>
                </div>
            </div>
            <div class="cosmetic-procedures-img-info">
                <img class="cosmetic-procedures-img" src="img/cosmetic-procedures/cosmetic-procedures3.png" alt="cosmetic-procedures3">
            </div>
        </div>
        <div class="cosmetic-procedures-four">
            <div class="cosmetic-procedures-img-info">
                <img class="cosmetic-procedures-img2" src="img/cosmetic-procedures/cosmetic-procedures4.png" alt="cosmetic-procedures4">
            </div>
            <div class="cosmetic-procedures-info"> 
                <h1 class="cosmetic-procedures-heading">«Сокровища Сиама»</h1>
                <p class="cosmetic-procedures-text">
                    Комплексная процедура для глубокого очищения, детоксикации и расслабления организма. 
                    Травяная парная и солевой скраб сменяются массажем, который дарит непередаваемое блаженство, 
                    разглаживает кожу, оказывает омолаживающий эффект.
                    Этапы спа-программы:
                    Тайская травяная парная/хамам/душ - 30 мин.
                    Минерально-солевой скраб для тела - 30 мин.
                    oil-массаж тела с ароматом «Традиционный Таиланд»-60 мин.
                </p>
                <div class="cosmetic-procedures-pricelist">
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Стоимость 
                            <br> 
                            120 минут
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Standart 
                            <br>
                            7 300 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Gold 
                            <br>
                            9 400 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Premium 
                            <br>
                            12 200 руб
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="cosmetic-procedures-five">
            <div class="cosmetic-procedures-info"> 
                <h1 class="cosmetic-procedures-heading">"Магия моря" с глиной и ламинарией</h1>
                <p class="cosmetic-procedures-text">
                    Перед процедурой обертывания Вашу кожу подготовят с помощью Slim-скраба из 
                    морской соли с натуральными водорослями. 
                    В процессе обертывания Вы насладитесь расслабляющим массажем головы. Затем 
                    питательная и подтягивающая биомаска для лица, а в конце SPA-программы 
                    часовой лимфодренажный массаж с маслом на Ваш выбор подарит Вам невероятный 
                    прилив жизненных сил, а Ваша кожа приобретет здоровый и сияющий вид. 
                </p>
                <div class="cosmetic-procedures-pricelist">
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Стоимость 
                            <br> 
                            120 минут
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Standart 
                            <br>
                            6 300 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Gold 
                            <br>
                            8 400 руб
                        </h1>
                    </div>
                    <div class="cosmetic-procedures-price">
                        <h1 class="cosmetic-procedures-price-text">Premium 
                            <br>
                            11 200 руб
                        </h1>
                    </div>
                </div>
            </div>
            <div class="cosmetic-procedures-img-info">
                <img class="cosmetic-procedures-img" src="img/cosmetic-procedures/cosmetic-procedures5.png" alt="cosmetic-procedures5">
            </div>
        </div>
    </div>
</section>

@endsection