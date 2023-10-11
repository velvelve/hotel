<div class="section-1-header">
    <div class="section-1-header__logo">
        <a href="{{ route('home') }}">
            <div class="section-1-header__logo-bg">
                <div class="section-1-header__logo-upperText">LUXURY</div>
                <div class="section-1-header__logo-lowerText">HOTELS</div>
            </div>
        </a>
    </div>
    <div class="section-1-header__menu">
        <ul>
            <li><a href="{{ route('home') }}">Главная</a></li>
            <li><a href="#">Номера</a></li>
            <li><a href="{{ route('contacts.index') }}">Контакты</a></li>
            @auth
                <li><a href="{{ route('profile') }}">Профиль</a></li>
                <li><a href="{{ route('logout') }}">Выйти</a></li>
            @else
                <li><a href="{{ route('login') }}">Войти</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @endauth
        </ul>
    </div>
</div>
