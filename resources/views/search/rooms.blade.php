@extends('layouts.main')

@section('content')
    <div class="searchResult-bg">
        <div class="searchResult">
            <div class="searchResult-head">Результаты поиска :</div>
            <x-rooms.search :guests=$guests />
            <div class="searchResults">
                @foreach ($roomsList as $room)
                    <div class="searchResult-content"> <!-- В этом диве генерируются карточки номеров -->
                        <div class="searchResult-content__item"> <!-- Карточка номера -->
                            <div class="item-description">
                                <img style="width: 50%" src="{{ asset($room->images[mt_rand(0, 2)]->path) }}"
                                    alt="{{ $room->images[mt_rand(0, 2)]->filename }}">
                                <div class="item-description__rightSide">
                                    <div class="item-description__rightSide-upperText"> <!-- Номер комнаты -->
                                        Комната №{{ $room->room_number }}
                                    </div>
                                    <div class="item-description__rightSide-centralText">
                                        <!-- Максимальная вместительность -->
                                        Максимальная вместительность: {{ $room->max_guest_count }}
                                    </div>
                                    <div class="item-description__rightSide-lowerText"> <!-- Цена -->
                                        Цена: {{ $room->price }}
                                    </div>
                                    <div>Сервисы:</div>

                                    @foreach ($room->services as $service)
                                        <div>{{ $service->name }}</div>
                                        <div>{{ $service->description }}</div>
                                    @endforeach

                                </div>
                            </div>
                            <form action="#" method="POST">
                                <div class="item-btn">
                                    <button><a
                                            href="{{ route('bookings.create', ['room_id' => $room->id]) }}">Выбрать</a></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
