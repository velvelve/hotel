@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/pages/services.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="bg">
        <div class="section-1 container">Услуги The Luxury Hotel </div>
        <div class="section-2">
            <div class="section-2__content">
                АКВАЗОНА LUCEO SPA
            </div>
        </div>
        <div class="section-3 container">
            <div class="section-3__description">
                <div class="section-3__description-item">
                    Расположенный в треугольном внутреннем дворе, четырехуровневый Luceo Spa располагает тренажерным залом,
                    саунами и релаксационным бассейном, свободным для посещения гостями отеля.
                </div>
                <div class="section-3__description-item">
                    Luceo Spa рад приветствовать гостей с 08:00 до 22:00
                </div>
                <div class="section-3__description-item">
                    Для уточнения деталей вы можете связаться с Luceo Spa по телефону +7-800-800-88-80 или по электронному
                    адресу info@luxury_hotel.ru
                </div>
            </div>
            <div class="section-3__image">
                <img src="img/servicesPage/sport.png">
            </div>
        </div>
        <div class="section-4">
            <div class="section-4__content">
                ПРАЧЕЧНАЯ И ХИМЧИСТКА
            </div>
        </div>
        <div class="section-5 container">
            <div class="section-5__image">
                <img src="img/servicesPage/massage.png">
            </div>
            <div class="section-5__description">
                <div class="section-5__description-item">
                    Секрет безупречного сервиса нашего отеля кроется в деталях. У нас гости могут воспользоваться регулярным
                    сервисом химчистки, услугами глажки и мелкого ремонта одежды.
                </div>
                <div class="section-5__description-item">
                    Чтобы узнать стоимость, пожалуйста, свяжитесь с нами по номеру телефону +7-800-800-88-80 или по
                    электронному
                    адресу info@luxury_hotel.ru
                </div>
            </div>
        </div>
        <div class="section-6">
            <div class="section-6__content">
                ТРАНСПОРТНЫЕ УСЛУГИ
            </div>
        </div>
        <div class="section-7 container">
            <div class="section-7__description">
                <div class="section-7__description-item">
                    Ощутите истинный комфорт с самых первых секунд.
                </div>
                <div class="section-7__description-item">
                    Гостям нашего отеля доступны автомобили представительского класса, которые готовы доставить вас в любую
                    точку города: из аэропорта или до вокзала, на балет или шоппинг. Наши водители – настоящие
                    профессионалы,
                    превосходно знающие город и владеющие английским языком.
                </div>
                <div class="section-7__description-item">
                    Для заказа трансфера или уточнения стоимости и деталей, просим вас связаться с нашей службой консьержей
                    по телефону +7 (880) 839 80 80 или по электронному адресу info@luxury_hotel.ru
                </div>
            </div>
            <div class="section-7__image">
                <img src="img/servicesPage/transfer.png">
            </div>
        </div>

        <div class="section-8">
            <div class="section-8__content">
                ЭКСКЛЮЗИВНЫЕ ПРЕДЛОЖЕНИЯ СЛУЖБЫ КОНСЬЕРЖЕЙ
            </div>
        </div>
        <div class="section-9 container">
            <div class="section-9__image">
                <img src="img/servicesPage/concierge.png">
            </div>
            <div class="section-9__description">
                <div class="section-9__description-item">
                    Службе консьержей нашего отеля не составит труда разработать индивидуальную культурную или
                    развлекательную
                    программу даже для самого искушенного гостя.
                </div>
                <div class="section-9__description-item">
                    Чтобы узнать стоимость, свяжитесь с нашей службой консьержей по телефону +7 (880) 839 80 80 или по
                    электронному адресу info@luxury_hotel.ru
                </div>
            </div>
        </div>
    </div>
@endsection
