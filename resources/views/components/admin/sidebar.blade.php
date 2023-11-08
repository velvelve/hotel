<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
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
                <a class="nav-link @if (request()->routeIs('admin.bookings.index')) active @endif" aria-current="page"
                    href="{{ route('admin.bookings.index') }}">
                    <span>📆</span>
                    Бронирования
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.services.index')) active @endif" aria-current="page"
                    href="{{ route('admin.services.index') }}">
                    <span>🤵</span>
                    Сервисы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.view-types.index')) active @endif" aria-current="page"
                    href="{{ route('admin.view-types.index') }}">
                    <span>🔲</span>
                    Виды из окна
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.bed-types.index')) active @endif" aria-current="page"
                    href="{{ route('admin.bed-types.index') }}">
                    <span>🛌</span>
                    Виды кроватей
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.notification-preferences.index')) active @endif" aria-current="page"
                    href="{{ route('admin.notification-preferences.index') }}">
                    <span>📲</span>
                    Настройки уведомлений
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (request()->routeIs('admin.images.index')) active @endif" aria-current="page"
                    href="{{ route('admin.images.index') }}">
                    <span>⛺</span>
                    Изображения
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
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('admin.rooms.index')) active @endif" aria-current="page"
                        href="{{ route('admin.rooms.index') }}">
                        <span>🏬</span>
                        Номера
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
                    <span>📌</span>
                    Типы номеров
                </a>
            </li>
        </ul>
    </div>
</nav>
