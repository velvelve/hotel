@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/booking/booking.css') }}" rel="stylesheet">

@section('content')
    <!-- Секция без хедера и футера -->
    <div class="content-booking">
        <div class="container">
            <h1 class="content-booking-heading">Оформление бронирования</h1>

            <div class="content-booking-wrp">
                <!-- Левая секция с формой -->
                <div class="section-form">
                    <form action="{{ route('bookings.store')}}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <div>
                                <label class="forms-label" for="check_in_date">Заезд</label>
                                @error('check_in_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="date" name="check_in_date" id="check_in_date" class="forms-input forms-date" value="{{ $check_in_date }}">
                            </div>
        
                            <div>
                                <label class="forms-label" for="check_out_date">Выезд</label>
                                @error('check_out_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="date" name="check_out_date" id="check_out_date" class="forms-input forms-date" value="{{ $check_out_date }}"  >
                            </div>
                        </div>
                

                            <label class="forms-label" for="last_name">Фамилия</label>
                            @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input placeholder="Введите фамилию" type="text" name="last_name" id="last_name" class="forms-input" value="{{ $user->last_name}} " >

                
                        <div class="form-group">
                            <div>
                                <label class="forms-label" for="first_name">Имя</label>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input placeholder="Введите имя" type="text" name="first_name" id="first_name"  class="forms-input forms-name" value="{{ $user->first_name}}" >
                            </div>
        
                            <div>
                                <label class="forms-label" for="first_name">Отчество</label>
                                @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input placeholder="Введите отчество" type="text" name="first_name" id="first_name" class="forms-input forms-midname" >
                            </div>
                        </div>

                        <label class="forms-label" for="tel">Телефон гостя</label>
                        @error('tel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input placeholder="Введите номер телeфона" type="tel" name="tel" id="tel" class="forms-input" >
                            <p class="form-connection-text">На этот номер вы получите SMS с номером брони</p>
                        </div>
                
                        <label class="forms-label" for="email">Электронная почта</label>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input placeholder="Введите E-mail" type="email" name="email" id="email" class="forms-input" value="{{ $user->email }}" >
                            <p class="form-connection-text">На этот адрес вы получите подтверждение бронирования</p>
                        </div>

                        <h2 class="form-info">Время заезда и выезда:</h2>
                        <p class="form-info-text">Заезд: с 14 до 23:30</p>
                        <p class="form-info-text form-info-text--last">Выезд: 12:00</p>

                        <label class="forms-label" for="wishes">Ваши пожелания</label>
                        <textarea  class="forms-input forms-textarea" name="wishes" id="wishes" cols="30" rows="10" 
                        placeholder="Если у вас есть дополнительные пожелания, пожалуйста, дайте нам знать. Мы постараемся учесть ваши пожелания при наличии такой возможности."></textarea>
                
                        <!-- Поле room_id, user_id, guests_count нужны для создания booking, но по макету их там быть не должно. room_type пока что воообще не нужен. -->
                        <div style="display: none" class="form-group d-none">
                            <label for="room_id">ID room</label>
                            @error('room_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="room_id" id="room_id" class="forms-input" value="{{ $room->id }}" >
                        </div>
                
                        <div style="display: none" class="form-group d-none">
                            <label for="user_id">ID user</label>
                            @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="user_id" id="user_id" class="forms-input" value="{{ $user->id }}" >
                        </div>

                        <div style="display: none" class="form-group d-none">
                            <label class="forms-label" for="guests_count">Количество гостей</label>
                            @error('guests_count')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="number" name="guests_count" id="guests_count" class="forms-input" value="{{ $guest_count }}" >
                        </div>

                        <div style="display: none" class="form-group d-none">
                            <label class="forms-label" for="room_type">Комната</label>
                            @error('room_type')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="room_type" id="room_type" class="forms-input" value="{{ $room->room_type }}" >
                        </div>
                
                        <button type="submit" class="button">Перейти к оплате</button>
                    </form>
                </div>
                <!-- Первая секция с информацией о номере -->
                <div class="section-room-info">
                    <div>
                        Информация о бронировании:
                    </div>
                    <div>
                        <h2>Итоговая информация о бронировании</h2>
                    </div>
                    <div>
                        Дополнительные услуги:
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
