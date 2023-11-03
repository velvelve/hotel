@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/pages/conference-rooms.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="bg">
        <div class="container">
            <div class="section-1">Элегантное пространство для проведения мероприятий и современный конференц-зал</div>
            <div class="section-2">
                <div class="section-2__description">
                    Наш Отель полностью оснащенный самыми современными помещениями для проведения встреч и мероприятий,
                    принимает самые разнообразные группы. Позвольте нашей команде преданных своему делу профессионалов
                    использовать фразу «Да, я могу!» отношение, чтобы превратить вашу деловую встречу или личное мероприятие
                    в нечто особенное.<br>

                    Наши специально разработанные меню вдохновлены местными и международными вкусами и используют свежие и
                    полезные для здоровья ингредиенты. Если вы хотите провести мероприятие на открытом воздухе, насладитесь
                    великолепным видом на закат на террасе у бассейна вместе с вкусной едой и освежающими напитками.

                </div>
                <div class="section-2__image">
                    <img src="img/conference-rooms/conference-room1.png">
                </div>
            </div>
            <div class="section-3">
                <img src="img/conference-rooms/conference-room2.png">
                <img src="img/conference-rooms/conference-room3.png">
                <img src="img/conference-rooms/conference-room4.png">
                <img src="img/conference-rooms/conference-room5.png">
            </div>
            <div class="section-4">
                <div class="section-4__head">Ключевая особенность: </div>
                <div class="section-4__body">
                    <div class="section-4__body-item">
                        <ul>
                            <li>Зона Прорыва</li>
                            <li>Кейтеринговые услуги</li>
                        </ul>
                    </div>
                    <div class="section-4__body-item">
                        <ul>
                            <li>Бесплатная парковка</li>
                            <li>Многоязычный персонал</li>
                        </ul>
                    </div>
                    <div class="section-4__body-item">
                        <ul>
                            <li>Светодиодный/ЖК-проектор</li>
                            <li>Флипчарт и маркеры</li>
                        </ul>
                    </div>
                    <div class="section-4__body-item">
                        <ul>
                            <li>Бесплатный вай-фай</li>
                            <li>Видео-конференция</li>
                        </ul>
                    </div>
                    <div class="section-4__body-item">
                        <ul>
                            <li>Микрофон</li>
                            <li>Естественный дневной свет</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-5">
                <div class="section-5__head">Помещения для встреч и мероприятий</div>
                <div class="section-5__body">
                    <div class="section-5__body-item">
                        Конференц-зал "Берли"
                        <ul>
                            <li>Пакс: 40</li>
                            <li>Окружение: Зал заседаний, Театр, Класс, П-образная форма</li>
                        </ul>
                    </div>
                    <div class="section-4__body-item">
                        Конференц-зал "Пар"
                        <ul>
                            <li>Пакс: 25</li>
                            <li>Окружение: Зал заседаний, Театр, Класс, П-образная форма</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
