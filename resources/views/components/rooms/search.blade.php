<div class="componentRoomsSearch">
    <div class="roomsSearch-head">
        Поиск номеров
    </div>
    <div class="roomsSearch-menu">
        <form action="{{ route('search.rooms') }}" method="POST">
            @csrf
            <div class="roomsSearch-menu__date">
                <div class="roomsSearch-menu__date-head">
                    <img src="/img/roomsSearch/date.svg">
                    <label for="date_range">Заезд - Выезд</label>
                </div>
                <input type="text" name="date_range" id="date_range">
            </div>

            <div class="roomsSearch-menu__guest">
                <div class="roomsSearch-menu__guest-head">
                    <img src="/img/roomsSearch/guest.svg">
                    <label for="guest_count">Кол-во гостей</label>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="number" name="guest_count" id="guest_count" min="1" max="5" value="{{ (int) $guests }}">
            </div>

            <div class="roomsSearch-menu__type">
                <div class="roomsSearch-menu__type-head">
                    <img src="/img/roomsSearch/type-room.svg">
                    <label for="type-room">Категория</label>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <select name="type-room" id="type-room">
                    <option value="Все" {{ $typeRoom == 'Все' ? 'selected' : '' }}>Все</option>
                    @foreach (\App\Enums\Rooms\RoomTypes::getRoomTypes() as $type)
                        <option value="{{ $type }}" {{ $typeRoom == $type ? 'selected' : '' }}>
                            {{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="roomsSearch-menu__btn">Искать</button>

        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        const dateRangePicker = $('input[name="date_range"]');
        const storedDateRange = localStorage.getItem('selectedDateRange');

        // Проверяем, соответствует ли сохраненное значение промежутку дат в формате 'YYYY-MM-DD - YYYY-MM-DD'
        if (/^\d{4}-\d{2}-\d{2} - \d{4}-\d{2}-\d{2}$/.test(storedDateRange)) {
            // Если сохраненное значение соответствует формату, инициализируем daterangepicker с сохраненным значением
            dateRangePicker.daterangepicker({
                autoApply: true,
                opens: 'center',
                minDate: dateRangePicker.val(
                    storedDateRange), // Устанавливаем сохраненное значение в качестве минимальной даты
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        } else {
            // Если сохраненное значение не соответствует формату, инициализируем daterangepicker с текущей датой как минимальной датой
            dateRangePicker.daterangepicker({
                autoApply: true,
                opens: 'center',
                minDate: new Date(),
                locale: {
                    format: 'YYYY-MM-DD'
                }
            })
        }

        // Обработчик события применения выбранного промежутка дат
        dateRangePicker.on('apply.daterangepicker', function(ev, picker) {
            const selectedDateRange =
                `${picker.startDate.format('YYYY-MM-DD')} - ${picker.endDate.format('YYYY-MM-DD')}`;
            localStorage.setItem('selectedDateRange',
                selectedDateRange); // Сохраняем выбранный промежуток дат в localStorage
        });
    });
</script>
