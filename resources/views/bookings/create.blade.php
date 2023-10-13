@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/booking/booking.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Секция без хедера и футера -->
    <div class="content-booking">
        <div class="container">
            <h1 class="content-booking-heading">Оформление бронирования</h1>

            <div class="content-booking-wrp">
                <!-- Левая секция с формой -->
                <div class="section-form">
                    <form action="{{ route('bookings.price')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div>
                                <label class="forms-label" for="check_in_date">Заезд</label>
                                @error('check_in_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="date" name="check_in_date" id="check_in_date"
                                       class="forms-input forms-date" value="{{ $check_in_date }}" readonly>
                            </div>

                            <div>
                                <label class="forms-label" for="check_out_date">Выезд</label>
                                @error('check_out_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="date" name="check_out_date" id="check_out_date"
                                       class="forms-input forms-date" value="{{ $check_out_date }}" readonly>
                            </div>
                        </div>


                        <label class="forms-label" for="last_name">Фамилия</label>
                        @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input placeholder="Введите фамилию" type="text" name="last_name" id="last_name"
                               class="forms-input" required>


                        <div class="form-group">
                            <div>
                                <label class="forms-label" for="first_name">Имя</label>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input placeholder="Введите имя" type="text" name="first_name" id="first_name"
                                       class="forms-input forms-name" required>
                            </div>

                            <div>
                                <label class="forms-label" for="patronymic_name">Отчество</label>
                                @error('patronymic_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input placeholder="Введите отчество" type="text" name="patronymic_name" id="patronymic_name"
                                       class="forms-input forms-midname" required>
                            </div>
                        </div>


                        <label class="forms-label" for="tel">Телефон гостя</label>
                        @error('tel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input placeholder="Введите номер телeфона" type="tel" name="tel" id="tel"
                                   class="forms-input" required>
                            <p class="form-connection-text">На этот номер вы получите SMS с номером брони</p>
                        </div>

                        <label class="forms-label" for="email">Электронная почта</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input placeholder="Введите E-mail" type="email" name="email" id="email" class="forms-input"
                                   required>
                            <p class="form-connection-text">На этот адрес вы получите подтверждение бронирования</p>
                        </div>

                        <label class="forms-label" for="promo_code">Промокод</label>
                        @error('promo_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input placeholder="Введите промокод" type="text" name="promo_code" id="promo_code"
                               class="forms-input" required>

                        <h2 class="form-info">Время заезда и выезда:</h2>
                        <p class="form-info-text">Заезд: с 14 до 23:30</p>
                        <p class="form-info-text form-info-text--last">Выезд: 12:00</p>

                        <label class="forms-label" for="wishes">Ваши пожелания</label>
                        <textarea class="forms-input forms-textarea"  name="wishes"
                                  id="wishes" cols="30" rows="10"
                                  placeholder="Если у вас есть дополнительные пожелания, пожалуйста, дайте нам знать. Мы постараемся учесть ваши пожелания при наличии такой возможности."></textarea>

                        <!-- Поле room_id, user_id, guests_count нужны для создания booking, но по макету их там быть не должно. Price для fake оплаты -->
                        <div style="display: none" class="form-group d-none">
                            <label for="room_id">ID room</label>
                            @error('room_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="room_id" id="room_id" class="forms-input"
                                   value="{{ $room->id }}">
                        </div>

                        <div style="display: none" class="form-group d-none">
                            <label for="user_id">ID user</label>
                            @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="user_id" id="user_id" class="forms-input"
                                   value="{{ $user->id }}">

                        </div>

                        <div style="display: none" class="form-group d-none">
                            <label class="forms-label" for="guests_count">Количество гостей</label>
                            @error('guests_count')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="guests_count" id="guests_count" class="forms-input"
                                   value="{{ $guests_count }}">
                        </div>

                        <div style="display: none" class="form-group d-none">
                            <label for="price">Цена</label>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="price" id="price" class="forms-input" value="{{ $room->price }}">
                        </div>

                        <button type="submit" class="button">Перейти к оплате</button>
                    </form>
                </div>

                <!-- Правая секция с информацией о номере -->
                <div class="section-room-info">
                    <p class="room-info-text">Информация о бронировании:</p>
                    <div class="room-info">
                        <div>
                            <img class="room-info-img" src="{{ asset($room->images[mt_rand(0, 2)]->path) }}" alt="">
                            <h3 class="room-info-heading">Номер {{ $room->room_type }}</h3>
                            <p class="room-info-paragraph">Эти люксы с отдельными спальной и гостиной зонами идеально
                                подойдут гостям, планирующим длительное пребывание в отеле.</p>
                            <a class="button room-info-button" href="javascript:history.back()">Изменить</a>
                        </div>
                    </div>

                    <!-- Скрыт для презентации на уроке -->
                    <div style="display: none">
                        <h2>Итоговая информация о бронировании</h2>
                        <div>
                            <p>Заезд: 01-10-23</p>
                            <p>Номер: Lux Junior</p>
                            <p>Сумма доп. услуг:</p>
                            <p>Общая стоимость:</p>
                        </div>

                        <div>
                            <p>Выезд: 05-10-23</p>
                            <p>59 400.00 rub</p>
                            <p>0.00 rub</p>
                            <p>59 400.00 rub</p>
                        </div>
                    </div>
                    <!-- Скрыт для презентации на уроке -->
                    <div style="display: none">
                        Дополнительные услуги:
                        <div style="display: flex">
                            <img src="https://picsum.photos/219/313" alt="">
                            <img src="https://picsum.photos/219/313" alt="">
                            <img src="https://picsum.photos/219/313" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif

@endsection
