@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/auth/profile.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="profile-bg">
    <div class="profile">
        <div class="profile-leftSide">
            <!-- Внешняя навигация настроек профиля -->
            <div class="profile-leftSide__nav">
                <ul class="profile-leftSide__nav-ul">
                    <li class="profile-leftSide__nav-li" id="reservation-li">
                        <a class="profile-leftSide__nav-link" onclick="clickOnReservation()"
                            id="reservation-link">Бронирование</a>
                    </li>
                    <li class="profile-leftSide__nav-li profile-leftSide__nav-li-active" id="profile-li">
                        <a class="profile-leftSide__nav-link" onclick="clickOnProfile()"
                            id="profile-link">Профиль</a>
                    </li>
                    <li class="profile-leftSide__nav-li" id="bonuses-li">
                        <a class="profile-leftSide__nav-link" onclick="clickOnBonuses()"
                            id="bonuses-link">Бонусы</a>
                    </li>
                </ul>
            </div>
            <!-- Раздел Бронирование -->
            <div class="profile-leftSide__reservation">
                <!-- Внутренняя навигация страницы Бронирование -->
                <div class="reservation-nav">
                    <ul class="reservation-nav-ul">
                        <li class="reservation-nav-li reservation-nav-li-active" id="current-li">
                            <a class="reservation-nav-link reservation-nav-link-active"
                                onclick="reservationClickOnCurrent()" id="current-link">текущие</a>
                        </li>
                        <li class="reservation-nav-li" id="past-li">
                            <a class="reservation-nav-link" onclick="reservationClickOnPast()"
                                id="past-link">прошедшие</a>
                        </li>
                        <li class="reservation-nav-li" id="canceled-li">
                            <a class="reservation-nav-link" onclick="reservationClickOnCanceled()"
                                id="canceled-link">отмененные</a>
                        </li>
                    </ul>
                </div>
                <div class="reservation-content">
                    <!-- Подраздел Текущие -->
                    <div class="reservation-content__current">
                        <div class="reservation-content__current-content">
                            Бронирований не найдено
                        </div>
                    </div>
                    <!-- Подраздел Прошедшие -->
                    <div class="reservation-content__past">
                        <div class="reservation-content__past-content">
                            Бронирований не найдено
                        </div>
                    </div>
                    <!-- Подраздел Отмененные -->
                    <div class="reservation-content__canceled">
                        <div class="reservation-content__canceled-content">
                            Бронирований не найдено
                        </div>
                    </div>
                </div>
            </div>
            <!-- Раздел Профиль -->
            <div class="profile-leftSide__profileSettings">
                <!-- Внутренняя навигция страницы Профиль -->
                <div class="profileSettings-nav">
                    <ul class="profileSettings-nav-ul">
                        <li class="profileSettings-nav-li">
                            <a class="profileSettings-nav-link profileSettings-nav-link-active"
                                onclick="profileClickOnGeneral()" id="general-link">Общее</a>
                        </li>
                        <li class="profileSettings-nav-li">
                            <a class="profileSettings-nav-link" onclick="profileClickOnSecurity()"
                                id="security-link">Безопасность</a>
                        </li>
                    </ul>
                </div>
                <div class="profileSettings-content">
                    @include('includes.message')
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <x-alert :message="$error" type="danger"></x-alert>
                        @Endforeach
                    @endif

                    @if(session('profile'))
                        <x-alert :message="session('profile')" type="success"></x-alert>
                    @endif
                    <!-- Подраздел Общее  -->
                    <div class="profileSettings-content__general">
                        <form action="{{ route('profile.update', auth()->user()) }}" method="post" class="profileSettings-form" id="profile-form">
                            @csrf
                            <div class="form-input-group__type-text">
                                <div class="form-item">
                                    <div class="form-item-name">Фамилия</div>
                                    <input name="last_name" type="text" class="form-item-input" value="{{ auth()->user()->last_name }}"/>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Имя</div>
                                    <input name="first_name" type="text" class="form-item-input" value="{{ auth()->user()->first_name }}"/>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Отчество</div>
                                    <input name="middle_name" type="text" class="form-item-input" value="{{ auth()->user()->middle_name }}" />
                                </div>
                                <div class="form-item form-item-date">
                                    <div class="form-item-name">Дата рождения</div>
                                    <input name="date_of_birth" type="date" class="form-item-input input-dateOfBirth" value="{{ auth()->user()->date_of_birth }}"/>
                                </div>
                                <div class="form-item form-item-gender">
                                    <div class="form-item-name">Пол</div>
                                    <select name="gender" class="form-item-input input-gender" form="profile-form">
                                        <option {{ (auth()->user()->gender === 'M') ? 'selected' : '' }} value="M">М</option>
                                        <option {{ (auth()->user()->gender === 'W') ? 'selected' : '' }} value="W">Ж</option>
                                    </select>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Телефон гостя</div>
                                    <input name="phone" type="tel" class="form-item-input" value="{{ auth()->user()->phone }}" />
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Электронная почта</div>
                                    <input name="email" type="email" class="form-item-input" value="{{ auth()->user()->email }}"/>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Страна</div>
                                    <input name="country" type="text" class="form-item-input" value="{{ auth()->user()->country }}" />
                                </div>
                                <div class="form-item">
                                    <div class="form-item-name">Город</div>
                                    <input name="city" type="text" class="form-item-input" value="{{ auth()->user()->city }}" />
                                </div>
                            </div>
                            <div class="form-input-group__type-checkbox">
                                <div class="form-input-group__type-checkbox-item">
                                    <input type="checkbox" id="sale-info" />
                                    <label for="sale-info">Получать информацию об эксклюзивных скидках на
                                        номера</label>
                                </div>
                                <div class="form-input-group__type-checkbox-item">
                                    <input type="checkbox" id="special-offer-info" />
                                    <label for="special-offer-info">Получать уведомления о спец предложениях</label>
                                </div>
                                <div class="form-input-group__type-checkbox-item">
                                    <input type="checkbox" id="bonus-info" />
                                    <label for="bonus-info">Получать уведомления о начисленных бонусах (1 бонус = 1
                                        рубль)</label>
                                </div>
                                <div class="form-input-group__type-checkbox-item">
                                    <input type="checkbox" id="hotel-answer-info" />
                                    <label for="hotel-answer-info">Получать уведомления об ответе отелей на ваши
                                        отзывы</label>
                                </div>
                            </div>
                            <button type="submit" class="form-btn">Сохранить</button>
                        </form>
                    </div>
                    <!-- Подраздел Безопасность -->
                    <div class="profileSettings-content__security">
                        <div class="security-head">
                            Изменить пароль
                        </div>
                        @if (session('error'))
                            <div>
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors)
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="{{ route('password.change') }}" method="POST" class="security-form" id="security-form">
                            @csrf
                            <div class="security-form__item">
                                <div class="security-form__item-head">
                                    Введите текущий пароль:
                                </div>
                                <input id="current_password" name="current_password" type="password" class="security-form__item-input" />
                            </div>
                            <div class="security-form__item">
                                <div class="security-form__item-head">
                                    Новый пароль:
                                </div>
                                <input id="new_password" name="new_password" type="password" class="security-form__item-input" />
                            </div>
                            <div class="security-form__item">
                                <div class="security-form__item-head">
                                    Повторите новый пароль:
                                </div>
                                <input id="new_password_confirmation" name="new_password_confirmation" type="password" class="security-form__item-input" />
                            </div>
                            <button id="change-password-btn" type="submit" class="form-btn">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Раздел Бонусы -->
            <div class="profile-leftSide__bonuses">
                <div class="bonuses-content">
                    <div class="bonuses-content__head">
                        История бонусной программы
                    </div>
                    <div class="bonuses-content__quantity">
                        К сожалению у Вас пока нет доступных бонусов.
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-rightSide">
            <div class="profile-rightSide__profileInfo">
                <div class="profileInfo-head">
                    <div class="profileInfo-head__avatar">
                        <img src="" class="profileInfo-head__img" />
                    </div>
                    <div class="profileInfo-head__nameAndEmail">
                        <div class="profileInfo-head__nameAndEmail-name">
                            {{ auth()->user()->last_name . ' ' . auth()->user()->first_name }}
                        </div>
                        <div class="profileInfo-head__nameAndEmail-email">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class="profileInfo-logout-btn">Выйти</a>
                <div class="current-balance">Текущий баланс</div>
                <div class="current-balance-points">Баллов: <span class="points">0</span></div>
                <div class="current-balance-nights">Ночей: <span class="nights">0</span></div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    let clickOnReservation = () => {
    let reservationLink = document.getElementById('reservation-link')
    let profileLink = document.getElementById('profile-link')
    let bonusesLink = document.getElementById('bonuses-link')

    let reservationLi = document.getElementById('reservation-li')
    let profileLi = document.getElementById('profile-li')
    let bonusesLi = document.getElementById('bonuses-li')

    let reservationContent = document.getElementsByClassName('profile-leftSide__reservation')
    for(let i = 0; i < reservationContent.length; i++){reservationContent[i].style.display='flex'}
    let profileContent = document.getElementsByClassName('profile-leftSide__profileSettings')
    for(let i = 0; i < profileContent.length; i++){profileContent[i].style.display='none'}
    let bonusesContent = document.getElementsByClassName('profile-leftSide__bonuses')
    for(let i = 0; i < bonusesContent.length; i++){bonusesContent[i].style.display='none'}

    if(!reservationLi.classList.contains('profile-leftSide__nav-li-active')) {
        reservationLi.classList.add('profile-leftSide__nav-li-active')
        profileLi.classList.remove('profile-leftSide__nav-li-active')
        bonusesLi.classList.remove('profile-leftSide__nav-li-active')
    }
}

let clickOnProfile = () => {
    let reservationLink = document.getElementById('reservation-link')
    let profileLink = document.getElementById('profile-link')
    let bonusesLink = document.getElementById('bonuses-link')

    let reservationLi = document.getElementById('reservation-li')
    let profileLi = document.getElementById('profile-li')
    let bonusesLi = document.getElementById('bonuses-li')

    let reservationContent = document.getElementsByClassName('profile-leftSide__reservation')
    for(let i = 0; i < reservationContent.length; i++){reservationContent[i].style.display='none'}
    let profileContent = document.getElementsByClassName('profile-leftSide__profileSettings')
    for(let i = 0; i < profileContent.length; i++){profileContent[i].style.display='flex'}
    let bonusesContent = document.getElementsByClassName('profile-leftSide__bonuses')
    for(let i = 0; i < bonusesContent.length; i++){bonusesContent[i].style.display='none'}

    if(!profileLi.classList.contains('profile-leftSide__nav-li-active')) {
        profileLi.classList.add('profile-leftSide__nav-li-active')
        reservationLi.classList.remove('profile-leftSide__nav-li-active')
        bonusesLi.classList.remove('profile-leftSide__nav-li-active')
    }
}

let clickOnBonuses = () => {
    let reservationLi = document.getElementById('reservation-li')
    let profileLi = document.getElementById('profile-li')
    let bonusesLi = document.getElementById('bonuses-li')

    let reservationLink = document.getElementById('reservation-link')
    let profileLink = document.getElementById('profile-link')
    let bonusesLink = document.getElementById('bonuses-link')

    let reservationContent = document.getElementsByClassName('profile-leftSide__reservation')
    for(let i = 0; i < reservationContent.length; i++){reservationContent[i].style.display='none'}
    let profileContent = document.getElementsByClassName('profile-leftSide__profileSettings')
    for(let i = 0; i < profileContent.length; i++){profileContent[i].style.display='none'}
    let bonusesContent = document.getElementsByClassName('profile-leftSide__bonuses')
    for(let i = 0; i < bonusesContent.length; i++){bonusesContent[i].style.display='flex'}

    if(!bonusesLi.classList.contains('profile-leftSide__nav-li-active')) {
        bonusesLi.classList.add('profile-leftSide__nav-li-active')
        reservationLi.classList.remove('profile-leftSide__nav-li-active')
        profileLi.classList.remove('profile-leftSide__nav-li-active')
    }
}

let reservationClickOnCurrent = () => {
    let reservationLiCurrent = document.getElementById('current-li')
    let reservationLiPast = document.getElementById('past-li')
    let reservationLiCanceled = document.getElementById('canceled-li')

    let reservationLinkCurrent = document.getElementById('current-link')
    let reservationLinkPast = document.getElementById('past-link')
    let reservationLinkCanceled = document.getElementById('canceled-link')

    let reservationCurrentContent = document.getElementsByClassName('reservation-content__current')
    for(let i = 0; i < reservationCurrentContent.length; i++){reservationCurrentContent[i].style.display='flex'}
    let reservationPastContent = document.getElementsByClassName('reservation-content__past')
    for(let i = 0; i < reservationPastContent.length; i++){reservationPastContent[i].style.display='none'}
    let reservationCanceledContent = document.getElementsByClassName('reservation-content__canceled')
    for(let i = 0; i < reservationCanceledContent.length; i++){reservationCanceledContent[i].style.display='none'}

    if(!reservationLiCurrent.classList.contains('reservation-nav-li-active')) {
        reservationLiCurrent.classList.add('reservation-nav-li-active')
        reservationLiPast.classList.remove('reservation-nav-li-active')
        reservationLiCanceled.classList.remove('reservation-nav-li-active')
    }

    if(!reservationLinkCurrent.classList.contains('reservation-nav-link-active')) {
        reservationLinkCurrent.classList.add('reservation-nav-link-active')
        reservationLinkPast.classList.remove('reservation-nav-link-active')
        reservationLinkCanceled.classList.remove('reservation-nav-link-active')
    }
}

let reservationClickOnPast = () => {
    let reservationLiCurrent = document.getElementById('current-li')
    let reservationLiPast = document.getElementById('past-li')
    let reservationLiCanceled = document.getElementById('canceled-li')

    let reservationLinkCurrent = document.getElementById('current-link')
    let reservationLinkPast = document.getElementById('past-link')
    let reservationLinkCanceled = document.getElementById('canceled-link')

    let reservationCurrentContent = document.getElementsByClassName('reservation-content__current')
    for(let i = 0; i < reservationCurrentContent.length; i++){reservationCurrentContent[i].style.display='none'}
    let reservationPastContent = document.getElementsByClassName('reservation-content__past')
    for(let i = 0; i < reservationPastContent.length; i++){reservationPastContent[i].style.display='flex'}
    let reservationCanceledContent = document.getElementsByClassName('reservation-content__canceled')
    for(let i = 0; i < reservationCanceledContent.length; i++){reservationCanceledContent[i].style.display='none'}

    if(!reservationLiPast.classList.contains('reservation-nav-li-active')) {
        reservationLiPast.classList.add('reservation-nav-li-active')
        reservationLiCurrent.classList.remove('reservation-nav-li-active')
        reservationLiCanceled.classList.remove('reservation-nav-li-active')
    }

    if(!reservationLinkPast.classList.contains('reservation-nav-link-active')) {
        reservationLinkPast.classList.add('reservation-nav-link-active')
        reservationLinkCurrent.classList.remove('reservation-nav-link-active')
        reservationLinkCanceled.classList.remove('reservation-nav-link-active')
    }
}

let reservationClickOnCanceled = () => {
    let reservationLiCurrent = document.getElementById('current-li')
    let reservationLiPast = document.getElementById('past-li')
    let reservationLiCanceled = document.getElementById('canceled-li')

    let reservationLinkCurrent = document.getElementById('current-link')
    let reservationLinkPast = document.getElementById('past-link')
    let reservationLinkCanceled = document.getElementById('canceled-link')

    let reservationCurrentContent = document.getElementsByClassName('reservation-content__current')
    for(let i = 0; i < reservationCurrentContent.length; i++){reservationCurrentContent[i].style.display='none'}
    let reservationPastContent = document.getElementsByClassName('reservation-content__past')
    for(let i = 0; i < reservationPastContent.length; i++){reservationPastContent[i].style.display='none'}
    let reservationCanceledContent = document.getElementsByClassName('reservation-content__canceled')
    for(let i = 0; i < reservationCanceledContent.length; i++){reservationCanceledContent[i].style.display='flex'}

    if(!reservationLiCanceled.classList.contains('reservation-nav-li-active')) {
        reservationLiCanceled.classList.add('reservation-nav-li-active')
        reservationLiCurrent.classList.remove('reservation-nav-li-active')
        reservationLiPast.classList.remove('reservation-nav-li-active')
    }

    if(!reservationLinkCanceled.classList.contains('reservation-nav-link-active')) {
        reservationLinkCanceled.classList.add('reservation-nav-link-active')
        reservationLinkCurrent.classList.remove('reservation-nav-link-active')
        reservationLinkPast.classList.remove('reservation-nav-link-active')
    }
}

let profileClickOnGeneral = () => {
    let profileLinkGeneral = document.getElementById('general-link')
    let profileLinkSecurity = document.getElementById('security-link')

    let profileGeneralContent = document.getElementsByClassName('profileSettings-content__general')
    for(let i = 0; i < profileGeneralContent.length; i++){profileGeneralContent[i].style.display='flex'}
    let profileSecurityContent = document.getElementsByClassName('profileSettings-content__security')
    for(let i = 0; i < profileSecurityContent.length; i++){profileSecurityContent[i].style.display='none'}

    if(!profileLinkGeneral.classList.contains('profileSettings-nav-link-active')) {
        profileLinkGeneral.classList.add('profileSettings-nav-link-active')
        profileLinkSecurity.classList.remove('profileSettings-nav-link-active')
    }
}

let profileClickOnSecurity = () => {
    let profileLinkGeneral = document.getElementById('general-link')
    let profileLinkSecurity = document.getElementById('security-link')

    let profileGeneralContent = document.getElementsByClassName('profileSettings-content__general')
    for(let i = 0; i < profileGeneralContent.length; i++){profileGeneralContent[i].style.display='none'}
    let profileSecurityContent = document.getElementsByClassName('profileSettings-content__security')
    for(let i = 0; i < profileSecurityContent.length; i++){profileSecurityContent[i].style.display='flex'}

    if(!profileLinkSecurity.classList.contains('profileSettings-nav-link-active')) {
        profileLinkSecurity.classList.add('profileSettings-nav-link-active')
        profileLinkGeneral.classList.remove('profileSettings-nav-link-active')
    }
}

</script>
