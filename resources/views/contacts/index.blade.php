@extends('layouts.main')

@section('content')
    <!-- Хлебные крошки, если нужны -->
    <ul>
        <li><a href="#">Главная</a></li>
        <li><a href="#">Контакты</a></li>
    </ul>

    <h1>Контакты</h1>

    <h2>Написать в отдел бронирования</h2>
    <ul>
        <li><a href="#">Ссылка на мессенджер 1</a></li>
        <li><a href="#">Ссылка на мессенджер 2</a></li>
        <!-- Добавьте нужные мессенджеры -->
    </ul>

    <h2>Другие способы связи</h2>
    <ul>
        <li>Отдел бронирования: +7-XXX-XXXX</li>
        <li>Отдел продаж: +7-XXX-XXXX</li>
        <li>Ресепшен: +7-XXX-XXXX</li>
    </ul>

    <h2>Социальные сети</h2>
    <ul>
        <li><a href="#">Ссылка на соцсеть 1</a></li>
        <li><a href="#">Ссылка на соцсеть 2</a></li>
        <!-- Добавьте нужные соцсети -->
    </ul>

    <h2>Реквизиты</h2>
    <p>Название компании</p>
    <p>Юридический адрес: адрес</p>
    <p>ИНН: XXXXXXXXXXXX</p>

    <h2>Задать вопрос или оставить отзыв</h2>
    <form action=" {{route('contacts.sendMessage')}} " method="POST">
        @csrf
        <label for="name">ФИО</label>
        <input type="text" id="name" name="name" required><br>

        <label for="phone">Телефон</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>

        <label for="hotel">Отель</label>
        <input type="text" id="hotel" name="hotel" required><br>

        <label for="category">Категория</label>
        <select id="category" name="category" required>
            <option value="Оставить отзыв">Оставить отзыв</option>
            <option value="Жалоба">Жалоба</option>
            <!-- Добавьте нужные категории -->
        </select><br>

        <label for="message">Задать вопрос или оставить отзыв</label><br>
        <textarea id="message" name="message" required></textarea><br>

        <input type="checkbox" id="agreement" name="agreement" required>
        <label for="agreement">Согласие на обработку персональных данных</label><br>

        <button type="submit">Отправить</button>
    </form>
@endsection