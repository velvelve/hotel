<header class="header_container">
    <div class="header_content_container">
        <div class="header_logo">
            <div class="header_logo_background">
                <div class="header_logo_upper_text">LUXURY</div>
                <div class="header_logo_lower_text">HOTELS</div>
            </div>
        </div>
        <div class="header_menu">
            <ul class="header_list">
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li><a href="{{ route('rooms.types')}}">Номера</a></li>
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
</header>