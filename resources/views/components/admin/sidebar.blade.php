<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span>📊</span>
                    Информационная доска
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>🚪</span>
                    Номера
                </a>
            </li>
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
                <a class="nav-link @if(request()->routeIs('admin.room-types.*')) active @endif" aria-current="page" href="{{ route('admin.room-types.index') }}">
                    <span>📌</span>
                    Типы номеров
                </a>
            </li>
        </ul>
    </div>
</nav>