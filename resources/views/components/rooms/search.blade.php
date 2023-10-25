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
                    <label class="roomsSearch-menu__label" for="date_range">Заезд - Выезд</label>
                </div>
                <input type="text" class="roomsSearch-menu__input" name="date_range" id="date_range">
            </div>

            <div class="roomsSearch-menu__guest">
                <div class="roomsSearch-menu__guest-head">
                    <img src="/img/roomsSearch/guest.svg">
                    <label class="roomsSearch-menu__label" for="guest_count">Кол-во гостей</label>
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
                <input type="number" class="roomsSearch-menu__input guest-input" name="guest_count" id="guest_count"
                    value="{{ (int) $guests }}">
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
