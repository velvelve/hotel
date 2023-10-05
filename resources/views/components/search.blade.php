<div class="roomsSearch">
    <div class="roomsSearch-head">
        Бронирование
    </div>
    <div class="roomsSearch-menu">
        <form action="" method="POST">
            @csrf
            <div class="roomsSearch-menu__date">
                <div class="roomsSearch-menu__date-head">
                    <img src="/img/roomsSearch/date.svg">
                    <label for="date_range">Заезд - Выезд</label>
                </div>
                <input type="text" name="date_range" id="date_range" required>
            </div>
            <div class="roomsSearch-menu__guest">
                <div class="roomsSearch-menu__guest-head">
                    <img src="/img/roomsSearch/guest.svg">
                    <label for="guest_count">Кол-во гостей</label>
                </div>
                <input type="number" name="guest_count" id="guest_count" value="2" required>
            </div>
            <button type="submit" class="roomsSearch-menu__btn">Искать</button>

        </form>
    </div>
</div>