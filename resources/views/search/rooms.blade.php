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
                                <div class="item-description__leftSide-block">
                                <img class="item-description-img" src="{{ asset($room->images[mt_rand(0, 2)]->path) }}"
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
                                        Комната №{{ $room->room_number }}
                                    </div>
                                    <div class="item-description__rightSide-textDescription">
                                        <div class="textDescription">В номерах есть все необходимое для комфортного пребывания и спокойного 
                                            сна.</div>
                                    </div>
                                    {{-- <div>Сервисы:</div> --}}
                                    <ul class="item-description__rightSide-servise">
                                        <li class="item-search-icon_list">
                                            <a class="icon" href="#"><img src="img/roomsSearch/icon/slippers.png" alt="
                                                slippers"></a>
                                        </li>
                                        <li class="item-search-icon_list">
                                            <a class="icon" href="#"><img src="img/roomsSearch/icon/teapot.png" alt="
                                                teapot"></a>
                                        </li>
                                        <li class="item-search-icon_list">
                                            <a class="icon" href="#"><img src="img/roomsSearch/icon/wifi.png" alt="
                                                wifi"></a>
                                        </li>
                                        <li class="item-search-icon_list">
                                            <a class="icon" href="#"><img src="img/roomsSearch/icon/television.png" alt="
                                                television"></a>
                                        </li>
                                        <li class="item-search-icon_list">
                                            <a class="icon" href="#"><img src="img/roomsSearch/icon/fan.png" alt="
                                                fan"></a>
                                        </li>
                                    </ul> 
                                    <div class="item-description__rightSide-centralText">
                                        <!-- Максимальная вместительность -->
                                        Максимальная вместительность: {{ $room->max_guest_count }}
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
