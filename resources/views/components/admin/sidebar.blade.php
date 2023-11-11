<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="list-group list-group-flush">
            <span class="ul-title">Для сотрудников</span>
            <li class="list-group-item @if (request()->routeIs('admin.index')) active @endif">
                <a class="nav-link" href="{{ route('admin.index') }}" aria-current="page">
                    <span>📊</span>
                    Информационная доска
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.bookings.index')) active @endif">
                <a class="nav-link" href="{{ route('admin.bookings.index') }}" aria-current="page">
                    <span>📆</span>
                    Бронирования
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.view-types.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.view-types.index') }}">
                    <span>🔲</span>
                    Виды из окна
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.bed-types.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.bed-types.index') }}">
                    <span>🛌</span>
                    Виды кроватей
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.images.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.images.index') }}">
                    <span>⛺</span>
                    Изображения
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.notification-preferences.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.notification-preferences.index') }}">
                    <span>📲</span>
                    Настройки уведомлений
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.reviews.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.reviews.index') }}">
                    <span>📝</span>
                    Отзывы
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.services.index')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.services.index') }}">
                    <span>🤵</span>
                    Сервисы
                </a>
            </li>
            <li class="list-group-item @if (request()->routeIs('admin.room-types.*')) active @endif">
                <a class="nav-link" aria-current="page" href="{{ route('admin.room-types.index') }}">
                    <span>📌</span>
                    Типы номеров
                </a>
            </li>
        </ul>
        @if (auth()->user()->isAdmin())
            <ul class="list-group list-group-flush">
                <span class="ul-title">Для администраторов</span>
                <li class="list-group-item @if (request()->routeIs('admin.users.index')) active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.users.index') }}">
                        <span>😀</span>
                        Пользователи
                    </a>
                </li>
                <li class="list-group-item @if (request()->routeIs('admin.locations.index')) active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.locations.index') }}">
                        <span>⛳</span>
                        Локации
                    </a>
                </li>
                <li class="list-group-item @if (request()->routeIs('admin.countries.index')) active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.countries.index') }}">
                        <span>🎌</span>
                        Страны
                    </a>
                </li>
                <li class="list-group-item @if (request()->routeIs('admin.cities.index')) active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.cities.index') }}">
                        <span>🏰</span>
                        Города
                    </a>
                </li>
                <li class="list-group-item @if (request()->routeIs('admin.rooms.index')) active @endif">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.rooms.index') }}">
                        <span>🏬</span>
                        Номера
                    </a>
                </li>
            </ul>
        @endif
    </div>
</nav>
<script type="text/javascript">
    $(document).ready(function() {
        hideLoading();
        let elements = document.querySelectorAll(".nav-link")
        elements.forEach(function(element, key) {
            element.addEventListener('click', function() {
                showLoading();
            });
        });
    });
</script>
