@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/pages/rent.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="bg">
        <div class="section-1">
            <div class="section-1__content">
                ПАРКОВКА
            </div>
        </div>
        <div class="section-2 container">
            <div class="section-2__description">
                <div class="section-2__description-item">
                    Мы предоставляем качественные услуги парковки. Сотрудники охранной службы обеспечивают полную
                    безопасность
                    на высоком уровне.
                </div>
                <div class="section-2__description-item">
                    Парковка доступна для всех гостей Отеля 24ч в день. Стоимость услуги 6500 рублей в сутки. Мы рекомендуем
                    бронировать парковочное место заблаговременно.
                </div>
                <div class="section-2__description-item">
                    Для уточнения деталей вы можете связаться с нами по телефону +7-800-800-88-80 или по электронному адресу
                    info@luxury_hotel.ru
                </div>
            </div>
            <div class="section-2__image">
                <img src="img/rent/parking.png">
            </div>
        </div>
        <div class="section-3">
            <div class="section-3__content">
                АРЕНДА АВТО
            </div>
        </div>
        <div class="section-4 container">
            <div class="section-4__image">
                <img src="img/rent/rent.png">
            </div>
            <div class="section-4__description">
                <div class="section-4__description-item">
                    Москва - один из крупнейших городов России.
                </div>
                <div class="section-4__description-item">
                    Конечно, перемещаясь на общественном транспорте или прогуливаясь пешком, всего охватить невозможно.
                </div>
                <div class="section-4__description-item">
                    Это требует затрат огромного количества времени и сил. Поэтому, лучше всего воспользоваться услугами
                    аренды
                    авто (с водителем или без водителя), которые Вы Можете заказать прямо в отеле.
                </div>
                <div class="section-4__description-item">
                    Для расчета стоимости заказа Вы всегда можете обратиться в службу консьерж непосредственно в отеле. При
                    необходимости, Вы также можете заранее связаться с нами по номеру телефону +7-800-800-88-80 или по
                    электронному адресу info@luxury_hotel.ru
                </div>
            </div>
        </div>
        <div class="section-5">
            <div class="section-5__content">
                ЧАСТНЫЙ КАТЕР
            </div>
        </div>
        <div class="section-6 container">
            <div class="section-6__description">
                <div class="section-6__description-item">
                    По-настоящему незабываемые впечатления в одном из самых красивых городов мира:
                </div>
                <div class="section-6__description-item">
                    - Катер LOTTE - самый просторный катер класса люкс в городе для прогулок по каналам с открытой площадкой
                    и
                    комфортабельной зоной отдыха на 9 персон внутри салона.
                </div>
                <div class="section-6__description-item">
                    - Мы предлагаем уникальные маршруты, заботливо подобранные для Вас командой консьержей
                </div>
                <div class="section-6__description-item">
                    - Возможность заказать на борт еду и напитки сделает Ваше путешествие незабываемым.
                </div>
                <div class="section-6__description-item">
                    Для заказа, уточнения стоимости и деталей, просим вас связаться с нашей службой консьержей по телефону
                    +7
                    (880) 839 80 80 или по электронному адресу info@luxury_hotel.ru
                </div>
            </div>
            <div class="section-6__image">
                <img src="img/rent/boat.png">
            </div>
        </div>
    </div>
@endsection
