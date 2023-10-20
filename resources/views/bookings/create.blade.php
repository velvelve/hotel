@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/booking/booking.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Секция без хедера и футера -->
    <section class="booking">
        <div class="container">
            <h1 class="booking__title">Оформление бронирования</h1>

            <div class="booking__wraper">

                <!-- Левая секция с формой -->
                <form class="booking__form" action="{{ route('bookings.price') }}" method="POST">
                    @csrf

                    <div class="booking__wrp">
                        <div class="booking__wrp-date">
                            <label class="booking__label" for="check_in_date">Заезд</label>
                            @error('check_in_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input booking__input_date" type="date" name="check_in_date"
                                id="check_in_date" value="{{ $check_in_date }}" readonly>
                        </div>

                        <div>
                            <label class="booking__label" for="check_out_date">Выезд</label>
                            @error('check_out_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input booking__input_date" type="date" name="check_out_date"
                                id="check_out_date" value="{{ $check_out_date }}" readonly>
                        </div>

                    </div>

                    <label class="booking__label" for="last_name">Фамилия</label>
                    @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input class="booking__input" placeholder="Введите фамилию" type="text" name="last_name"
                        id="last_name" required>

                    <div class="booking__wrp booking__wrp_name">
                        <div class="booking__wrp-f-name">
                            <label class="booking__label" for="first_name">Имя</label>
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input booking__input_f-name" placeholder="Введите имя" type="text"
                                name="first_name" id="first_name" required>
                        </div>

                        <div class="booking__wrp-l-name">
                            <label class="booking__label" for="patronymic_name">Отчество</label>
                            @error('patronymic_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input" placeholder="Введите отчество" type="text"
                                name="patronymic_name" id="patronymic_name" required>
                        </div>
                    </div>

                    <div class="booking__wrp">
                        <div class="booking__wrp-communication">
                            <label class="booking__label" for="tel">Телефон гостя</label>
                            @error('tel')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input" placeholder="Введите номер телeфона" type="tel" name="tel"
                                id="tel" required>
                        </div>
                        <p class="booking__form-text">На этот номер вы получите SMS с номером брони</p>
                    </div>

                    <div class="booking__wrp">
                        <div class="booking__wrp-communication">
                            <label class="booking__label" for="email">Электронная почта</label>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input class="booking__input" placeholder="Введите E-mail" type="email" name="email"
                                id="email" required>
                        </div>
                        <p class="booking__form-text">На этот адрес вы получите подтверждение бронирования</p>
                    </div>

                    <label class="booking__label" for="promo_code">Промокод</label>
                    @error('promo_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input class="booking__input" placeholder="Введите промокод" type="text" name="promo_code"
                        id="promo_code">

                    <h2 class="booking__subtitle">Время заезда и выезда:</h2>
                    <p class="booking__text-info">Заезд: с 14 до 23:30</p>
                    <p class="booking__text-info booking__text-info_last">Выезд: 12:00</p>

                    <label class="booking__label" for="wishes">Ваши пожелания</label>
                    <textarea class="booking__input booking__input_textarea" name="wishes" id="wishes"
                        placeholder="Если у вас есть дополнительные пожелания, пожалуйста, дайте нам знать. Мы постараемся учесть ваши пожелания при наличии такой возможности."></textarea>

                    <!-- Скрытые input требуемые для дальнейшего корректного сохранения booking.  -->
                    <div class="visually-hidden">
                        <label for="room_id">ID room</label>
                        @error('room_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="room_id" id="room_id" value="{{ $room->id }}">

                        <label for="user_id">ID user</label>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="user_id" id="user_id" value="{{ $user->id }}">

                        <label for="guests_count">Количество гостей</label>
                        @error('guests_count')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="guests_count" id="guests_count" value="{{ $guests_count }}">

                        <label for="price">Цена</label>
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="price" id="price" value="{{ $room->price }}">
                    </div>

                    <div class="booking__wraper">
                        <button class="booking__button" type="submit">Перейти к оплате</button>
                        <a class="booking__button" href="javascript:history.back()">Назад</a>
                    </div>

                </form>

                <!-- Правая секция с информацией о номере -->
                <div class="booking-information">
                    <p class="booking-information__info">Информация о бронировании:</p>

                    <div class="booking-information__card">
                        <img src="{{ asset($room->images[mt_rand(0, 2)]->path) }}" alt="image-room" width="691"
                            height="291">
                        <h2 class="booking-information__title">Номер {{ $room->room_type }}</h2>
                        <p class="booking-information__room-parameter">35 m2 | 2 кровати TWIN или 1 кровать Queen или King
                            | 3 взрослых, 1 ребенок (0-11 лет)</p>
                        <ul class="booking-information__services-list">
                            @foreach ($room->includedServices as $service)
                                <li class="booking-information__services-item">
                                    <img class="booking-information__service-icon" src="{{ $service->icon[0]->path }}" alt="{{ $service->icon[0]->filename }}" title="{{ $service->name }}">
                                </li>
                            @endforeach
                        </ul>
                        <p class="booking-information__text">Эти люксы с отдельными спальной и гостиной зонами идеально
                            подойдут гостям, планирующим длительное пребывание в отеле.</p>
                    </div>

                    <div class="booking-information__result">
                        <h2 class="booking-information__title">Итоговая информация о бронировании</h2>

                        <div class="booking-information__wrp">
                            <ul class="booking-information__list">
                                <li class="booking-information__item">
                                    <p>Заезд: <span class="booking-information__important">{{ $check_in_date }}</span></p>
                                </li>
                                <li class="booking-information__item">
                                    <p>Номер: <span class="booking-information__important">{{ $room->room_type }}</span>
                                    </p>
                                </li>
                                <li class="booking-information__item">
                                    <p>Сумма доп. услуг:</p>
                                </li>
                                <li class="booking-information__item">
                                    <p>Общая стоимость:</p>
                                </li>
                            </ul>

                            <ul class="booking-information__list">
                                <li class="booking-information__item">
                                    <p>Выезд: <span class="booking-information__important">{{ $check_out_date }}</span>
                                    </p>
                                </li>
                                <li class="booking-information__item">
                                    <p><span class="booking-information__important">{{ $room->price }} rub</span></p>
                                </li>
                                <li class="booking-information__item">
                                    <p><span class="booking-information__important">0.00 rub</span></p>
                                </li>
                                <li class="booking-information__item">
                                    <p><span class="booking-information__important">{{ $room->price }} rub</span></p>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="booking-information__additional-services">
                        <p class="booking-information__info">Дополнительные услуги:</p>

                        <div class="booking-information__wrp">
                            <div class="booking-information__image-container">
                                <img class="booking-information__img" src="{{ asset('img/booking/service1.jpg') }}"
                                    alt="images-services" width="219" height="313">
                                <a href="#" class="booking-information__overlay-text">Завтрак Подробнее ></a>
                            </div>
                            <div class="booking-information__image-container">
                                <img class="booking-information__img" src="{{ asset('img/booking/service2.jpg') }}"
                                    alt="images-services" width="219" height="313">
                                <a href="#" class="booking-information__overlay-text">Шведский стол Подробнее ></a>
                            </div>
                            <div class="booking-information__image-container">
                                <img class="booking-information__img" src="{{ asset('img/booking/service3.jpg') }}"
                                    alt="images-services" width="219" height="313">
                                <a href="#" class="booking-information__overlay-text">Скидка 10% в ресторане Подробнее ></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

@endsection
