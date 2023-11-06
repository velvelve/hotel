@extends('layouts.main')

@section('content')
    <div class="searchResult-bg">
        <div class="searchResult">
            <div class="searchResult-head">Результаты поиска :</div>
            <x-rooms.search :guests=$guests :typeRoom="$typeRoom" />
            <div class="searchResults">
                @forelse ($roomsList as $room)
                    <div class="searchResult-content"> <!-- В этом диве генерируются карточки номеров -->
                        <div class="searchResult-content__item"> <!-- Карточка номера -->
                            <div class="item-description">
                                <div class="item-description__leftSide-block">
                                    <img class="item-description-img" src="{{ $room->images[mt_rand(0, 2)]->path }}"
                                        alt="{{ $room->images[mt_rand(0, 2)]->filename }}">
                                    <div class="item-description__leftSide-block-text">
                                        <p class="item-description__leftSide-block-text-heading">Описание тарифа</p>
                                        <p>Только номер</p>
                                        <p>Возврату не подлежит</p>
                                        <p>Оплата баллами</p>
                                    </div>
                                </div>
                                <div class="item-description__rightSide">
                                    <div class="item-description__rightSide-upperText"> <!-- Номер комнаты -->
                                        {{ $room->roomType->name }} {{ $room->viewType->description }}
                                    </div>
                                    <div class="item-description__rightSide-textDescription">
                                        <div class="textDescription">{{ $room->description }}</div>
                                    </div>
                                    {{-- <div>Сервисы:</div> --}}
                                    <ul class="item-description__rightSide-servise">
                                        @foreach ($room->includedServices as $service)
                                            <li class="item-search-icon_list">
                                                <a href="#"><img class="icon" src="{{ $service->icon[0]->path }}"
                                                        alt="{{ $service->icon[0]->filename }}"
                                                        title="{{ $service->name }}"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="item-description__rightSide-centralText">
                                        <!-- Максимальная вместительность -->
                                        Максимальная вместительность:
                                        {{ $room->adults_max_guests + $room->children_max_guests }}
                                    </div>
                                    <div class="item-description__rightSide-lowerText"> <!-- Цена -->
                                        Цена: {{ $room->price }}
                                    </div>


                                    @foreach ($room->services as $service)
                                        {{-- <div class="item-description__leftSide-textDescription">{{ $service->name }}</div> --}}
                                        {{-- <div>{{ $service->description }}</div> --}}
                                    @endforeach

                                </div>
                            </div>
                            <form action="{{ route('bookings.create', ['room_id' => $room->id]) }}" method="GET">
                                <div class="item-btn">
                                    <button>Выбрать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <h2 style="color: #77635c;font-size: 50px;">Свободные номера не найдены 😥</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
