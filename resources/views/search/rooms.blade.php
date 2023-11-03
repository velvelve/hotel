@extends('layouts.main')

@section('content')
    <div class="searchResult-bg">
        <div class="searchResult-wrapper">
            <div class="top-section">
                <div class="searchResult-head">Результаты поиска :</div>
                <x-rooms.search :guests=$guests :typeRoom="$typeRoom" />
            </div>
            <div class="search-carts-container">
                @forelse ($roomsList as $room)
                    {{--Карточка номера--}}
                    <div class="searchResult-cart">
                        <div class="cart-img">
                            <img class="cart-img" src="{{ asset($room->images[mt_rand(0, 2)]->path) }}"
                                 alt="{{ $room->images[mt_rand(0, 2)]->filename }}">
                        </div>
                        {{-- Сервисы:--}}
                        <ul class="cart-includedServices">
                            @foreach ($room->includedServices as $service)
                                <li class="cart-icon-list">
                                    <img class="cart-icon" src="{{ $service->icon[0]->path }}" alt="{{ $service->icon[0]->filename }}" title="{{ $service->name }}">
                                </li>
                            @endforeach
                        </ul>
                        <div class="cart-bottom-wrapper">
                            {{--Тип комнаты--}}
                            <div class="cart-roomType">
                                {{ $room->roomType->name }} {{$room->viewType->description}}
                            </div>
                            <div class="cart-description">
                                {{--колличество взрослых--}}
                                <div class="cart-adults_max_guests cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/men.svg" alt="взрослые" title="Взрослые">
                                    <p class="cart-description-text">{{ $room->adults_max_guests}}</p>
                                </div>
                                {{--колличество детей--}}
                                <div class="cart-adults_max_guests cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/child.svg" alt="дети" title="Дети">
                                    <p class="cart-description-text">{{$room->children_max_guests }}</p>
                                </div>
                                {{--полщадь комнаты--}}
                                <div class="cart-area cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/area.svg" alt="площадь" title="Площадь">
                                    <p class="cart-description-text">{{$room->area}}m²</p>
                                </div>
                                {{--Тип кровати--}}
                                <div class="cart-bed_type cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/bed.svg" alt="кровать" title="Кровати">
                                    <p class="cart-description-text">{{$room->BedType->description}}</p>
                                </div>
                            </div>
                            <div class="cart-price">
                                {{--Цена--}}
                                <div class="price-wrapper">
                                    <p class="tariff">RUB {{$room->price}}</p>
                                    <p class="tariff-discount">RUB {{round($room->price - ($room->price / 100) * 24,2) }} 24% savings </p>
                                </div>

                                <form action="{{ route('bookings.create', ['room_id' => $room->id]) }}" method="GET">
                                        <button class="cart-btn">Выбрать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 style="color: #77635c;font-size: 50px;">Свободные номера не найдены 😥</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
