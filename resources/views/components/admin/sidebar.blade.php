<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.index')) active @endif" aria-current="page"
                    href="{{ route('admin.index') }}">
                    <span>📊</span>
                    Информационная доска
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.view-type.index')) active @endif" aria-current="page"
                    href="{{ route('admin.view-type.index') }}">
                    <span>🔲</span>
                    Виды из окна
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.bed-type.index')) active @endif" aria-current="page"
                    href="{{ route('admin.bed-type.index') }}">
                    <span>🛌</span>
                    Виды кроватей
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.notification-preference.index')) active @endif" aria-current="page"
                    href="{{ route('admin.notification-preference.index') }}">
                    <span>📲</span>
                    Настройки уведомлений
                </a>
            </li>
            @if (auth()->user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.locations.index')) active @endif" aria-current="page"
                        href="{{ route('admin.locations.index') }}">
                        <span>⛳</span>
                        Локации
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.countries.index')) active @endif" aria-current="page"
                        href="{{ route('admin.countries.index') }}">
                        <span>🎌</span>
                        Страны
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.cities.index')) active @endif" aria-current="page"
                        href="{{ route('admin.cities.index') }}">
                        <span>🏰</span>
                        Города
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>☎</span>
                    Контакты
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>😀</span>
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>🛎</span>
                    Бронирования
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>📌</span>
                    Типы номеров
                </a>
            </li>
        </ul>
    </div>
</nav>
