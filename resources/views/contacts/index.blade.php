@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/contacts/contacts.css') }}" rel="stylesheet">
@endpush

@section('content')

    <!-- Секция без хедера и футера -->
    <div class="content-contacts">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @include('includes.message')
        <!-- Первая секция с контактами -->
        <div class="section-contact">

            <div class="section-contact_content">
                <!-- Загаловок -->
                <h1 class="section-contact_heading">Контакты</h1>
                <!-- Номера отдела бронирования с иконками-->
                <div class="section-contact_booking-dep">
                    <h2 class="section-contact_heading">Написать в отдел бронирования</h2>
                    <ul class="section-contact_messenger">
                        <li class="section-contact_heading section-contact_messenger-list ">
                            <img class="icons-img" src="img/contacts/whatsapp.png" alt="whatsapp">
                            <a class="a-number" href="#">+7-900-900-99-90</a>
                        </li>
                        <li class="section-contact_heading section-contact_messenger-list">
                            <img class="icons-img" src="img/contacts/telegram.png" alt="telegram">
                            <a class="a-number" href="#">+7-900-900-99-90</a>
                        </li>
                    </ul>
                </div>
                <!--Номера -->
                <div class="section-contact_connection">
                    <h2 class="section-contact_heading">Другие способы связи</h2>
                    <ul class="connection_list">
                        <li class="section-contact_heading connection-_messenger-list">Отдел бронирования: +7-900-900-99-90
                        </li>
                        <li class="section-contact_heading connection-_messenger-list">Отдел продаж: +7-900-909-99-90</li>
                        <li class="section-contact_heading connection-_messenger-list">Ресепшен: +7-900-909-99-99</li>
                    </ul>
                </div>
            </div>
            <!-- картинка ресепшена -->
            <div class="section-contact_img">
                <img class="img_reception" src="img/contacts/reception2.png" alt="reception">
            </div>
        </div>

        <!-- Вторая секция -->
        <div class="section-two">
            <!--Левая часть второй секции -->
            <div class="section-two_forms">
                <div class="section-contact_bg">
                    <div class="section-contact_head">
                        <!-- Загаловок -->
                        <h2 class="section-contact_heading section-two_heading">Задать вопрос или оставить отзыв</h2>
                    </div>
                    <!-- Форма для заполнения -->
                    <form class="forms" action=" {{ route('contacts.sendMessage') }} " method="POST">
                        @csrf
                        <label class="forms-title" for="name">Фамилия и имя</label>
                        <input class="forms-input input_name" type="text" id="name" name="name"
                            placeholder="Введите фамилию и имя" prequired value="{{ old('name') }}"><br>

                        <label class="forms-title" for="phone">Телефон</label>
                        <input class="forms-input input_name" type="tel" id="phone" name="phone"
                            placeholder="Введите номер телефона" required value="{{ old('phone') }}"><br>

                        <label class="forms-title" for="email">Email</label>
                        <input class="forms-input input_name" type="email" id="email" name="email"
                            placeholder="Введите E-mail" required value="{{ old('email') }}"><br>
                        <!-- Отель и категория в одну линию -->
                        <div class="forms-categories">
                            <div class="categories-hotel">
                                <label class="forms-title title_hotel" for="hotel">Отель</label>
                                <input class="forms-input forms-input_hotel" type="text" id="hotel" name="hotel"
                                    placeholder="Введите название Отеля" required value="{{ old('hotel') }}"><br>
                            </div>
                            <div class="forms-feedback">
                                <label class="forms-title " for="category">Категория</label>
                                <select class="forms-input input-feedback" id="category" name="category" required>
                                    <option class="text" @if (old('category') === 'Оставить отзыв') selected @endif
                                        value="Оставить отзыв">Оставить отзыв</option>
                                    <option class="text" @if (old('category') === 'Жалоба') selected @endif value="Жалоба">
                                        Жалоба</option>
                                </select><br>
                            </div>
                        </div>
                        <label class="forms-title title-question" for="message">Задать вопрос или оставить
                            отзыв</label><br>
                        <textarea class="text-question" id="message" name="message"
                            placeholder="Если у вас есть дополнительные пожелания, 
пожалуйста, дайте нам знать. Мы постараемся учесть ваши пожелания при наличии такой возможности."
                            required>{{ old('message') }}</textarea><br>
                        <!-- Чекбокс на обработку данных -->
                        <div class="title-question_approval">
                            <input class="approval" type="checkbox" id="agreement" name="agreement" required>
                            <label class="forms-title title-question_heading" for="agreement">Согласие на обработку
                                персональных данных</label><br>
                        </div>
                        <!-- Кнопка -->
                        <button class="button" type="submit">Отправить</button>
                    </form>
                </div>
            </div>
            <!-- Правая часть второй секции -->
            <div class="section-two_info">
                <div class="section-two_img-container">
                    <!-- Картинка-->
                    <img class="section-two_img" src="img/contacts/reception.png" alt="reception">
                </div>
                <!-- Реквизиты -->
                <div class="info">
                    <h2 class="section-contact_heading">Реквизиты</h2>
                    <div class="info-groups">
                        <p class="section-contact_heading info_list">Название компании: Luxury Hotels Group</p>
                        <p class="section-contact_heading info_list">Юридический адрес: г.Москва, ул.Никольская, д 12</p>
                        <p class="section-contact_heading info_list">ИНН: 121200007895</p>
                    </div>
                </div>
                <!-- Соц сети-->
                <div class="section-two_social">
                    <h2 class="section-contact_heading section-two_socia-title">Социальные сети</h2>
                    <!-- Иконки -->
                    <ul class="section-two_social-networks">
                        <li class="section-contact_heading social-networks_list">
                            <a class="a-number a-social" href="#"><img class="icons-img vk"
                                    src="img/contacts/icons-vk.png" alt="vk"></a>
                        </li>
                        <li class="section-contact_heading social-networks_list">
                            <a class="a-number a-social_twit" href="#"><img class="icons-img twitter"
                                    src="img/contacts/icons-twitter.png" alt="twitter"></a>
                        </li>
                        <li class="section-contact_heading social-networks_list">
                            <a class="a-number a-social" href="#"><img class="icons-img facebook"
                                    src="img/contacts/icons-facebook.png" alt="facebook"></a>
                        </li>
                        <li class="section-contact_heading social-networks_list">
                            <a class="a-number a-social_twit" href="#"><img class="icons-img instagram"
                                    src="img/contacts/icons-instagram.png" alt="instagram"></a>
                        </li>
                        <li class="section-contact_heading social-networks_list">
                            <a class="a-number a-social" href="#"><img class="icons-img tiktok"
                                    src="img/contacts/icons-tiktok.png" alt="tiktok"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
