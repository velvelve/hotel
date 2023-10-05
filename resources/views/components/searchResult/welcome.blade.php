<div class="searchResult-bg">
    <div class="searchResult">
        <div class="searchResult-head">
            Результаты поиска :
        </div>

        <!-- Здесь должно быть меню поиска -->

        <div class="searchResult-content"> <!-- В этом диве генерируются карточки номеров -->
            <div class="searchResult-content__item"> <!-- Карточка номера -->
                <div class="item-description">
                    <div class="item-description__leftSide">
                        <img src="{{ url($room->image()->path) }}" alt="{{ $room->image()->filename }}"> <!-- Фотография карточки -->
                    </div>
                    <div class="item-description__rightSide">
                        <div class="item-description__rightSide-upperText"> <!-- Номер комнаты -->
                            Комната №{{ $room->number }}
                        </div>
                        <div class="item-description__rightSide-centralText"> <!-- Максимальная вместительность -->
                            Максимальная вместительность: {{ $room->max_guest_count }}
                        </div>
                        <div class="item-description__rightSide-lowerText"> <!-- Цена -->
                            Цена: {{ $room->price }}
                        </div>
                    </div>
                </div>
                <div class="item-btn">
                    <button><a href="#">Забронировать</a></button>
                </div>
            </div>
        </div>
    </div>
</div>