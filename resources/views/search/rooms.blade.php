@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/searchResult/searchResult.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="searchResult-bg">
        <div class="searchResult-wrapper">
            <div class="top-section">
                <div class="searchResult-title">Результаты поиска :</div>
                <x-rooms.search :guests=$guests :typeRoom="$typeRoom" />
            </div>
            <div class="search-carts-container">
                @forelse ($roomsList as $room)
                    {{-- Модальное окно --}}
                    <div class="modal" id="modal-{{ $room->id }}">
                        <div class="modal-box">
                            <div class="modal-title">
                                <div class="modal-room-type">{{ $room->roomType->name }} {{ $room->viewType->description }}
                                </div>
                                <img class="modal-close" id="close-modal-{{ $room->id }}"
                                    src="img/roomsSearch/cart-icons/close.svg" alt="close">
                            </div>
                            <div class="modal-img-wrapper">
                                @php
                                    $roomImagesSize = sizeof($room->images);
                                @endphp
                                @if ($roomImagesSize > 0)
                                    <img class="modal-img-0" src="{{ $room->images[0]->path }}"
                                        alt="{{ $room->images[0]->filename }}">
                                @endif
                                @if ($roomImagesSize > 1)
                                    <img class="modal-img-1" src="{{ $room->images[1]->path }}"
                                        alt="{{ $room->images[0]->filename }}">
                                @endif
                                @if ($roomImagesSize > 3)
                                    <div class="modal-right-img">
                                        <img class="modal-img-2" src="{{ $room->images[2]->path }}"
                                            alt="{{ $room->images[0]->filename }}">
                                        <img class="modal-img-2" src="{{ $room->images[3]->path }}"
                                            alt="{{ $room->images[0]->filename }}">
                                    </div>
                                @endif
                            </div>
                            <div class="modal-bottom">
                                <div class="modal-left-wrapper">
                                    <div class="modal-description">
                                        {{-- колличество взрослых --}}
                                        <div class="modal-adults_max_guests modal-description-text_icon_wrapper">
                                            <img class="modal-description-img" src="img/roomsSearch/cart-icons/men.svg"
                                                alt="взрослые" title="Взрослые">
                                            <p class="modal-description-text">{{ $room->adults_max_guests }}
                                                @choice('messages.adult_plural', $room->adults_max_guests)</p>
                                        </div>
                                        {{-- колличество детей --}}
                                        <div class="modal-adults_max_guests modal-description-text_icon_wrapper">
                                            <img class="modal-description-img" src="img/roomsSearch/cart-icons/child.svg"
                                                alt="дети" title="Дети">
                                            <p class="modal-description-text">{{ $room->children_max_guests }}
                                                @choice('messages.child_plural', $room->children_max_guests) (0-11 лет)</p>
                                        </div>
                                        {{-- полщадь комнаты --}}
                                        <div class="modal-area modal-description-text_icon_wrapper">
                                            <img class="modal-description-img" src="img/roomsSearch/cart-icons/area.svg"
                                                alt="площадь" title="Площадь">
                                            <p class="modal-description-text">{{ $room->area }}m²</p>
                                        </div>
                                        {{-- Тип кровати --}}
                                        <div class="modal-bed_type modal-description-text_icon_wrapper">
                                            <img class="modal-description-img" src="img/roomsSearch/cart-icons/bed.svg"
                                                alt="кровать" title="Кровати">
                                            <p class="modal-description-text">{{ $room->BedType->description }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-services">
                                        <ul class="modal-includedServices">
                                            @foreach ($room->includedServices as $service)
                                                <li class="modal-icon-list">
                                                    @if (sizeof($service->icon) > 0)
                                                        <img class="modal-icon" src="{{ $service->icon[0]->path }}"
                                                            alt="{{ $service->icon[0]->filename }}" @endif
                                                        title="{{ $service->name }}">
                                                        <p class="modal-icon-text">{{ $service->name }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-right-wrapper">
                                    <div class="modal-description">
                                        {{ $room->description }}
                                    </div>
                                    <div class="modal-price-wrapper">
                                        <div class="modal-price">
                                            <p class="modal-tariff">RUB {{ $room->price }}</p>
                                            <p class="modal-tariff-discount">RUB
                                                {{ round($room->price - ($room->price / 100) * 24, 2) }} 24% savings </p>
                                        </div>
                                        <form action="{{ route('bookings.create') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                                            <button class="cart-btn">Выбрать</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Карточка номера --}}
                    <div class="searchResult-cart">
                        <div class="cart-img" id="open-modal-{{ $room->id }}">
                            @php
                                $cartRoomImagesSize = sizeof($room->images);
                            @endphp
                            @if ($cartRoomImagesSize > 0)
                                <img class="cart-img" src="{{ $room->images[mt_rand(0, $cartRoomImagesSize - 1)]->path }}"
                                    alt="{{ $room->images[mt_rand(0, $cartRoomImagesSize - 1)]->filename }}">
                            @endif
                        </div>
                        {{-- Сервисы: --}}
                        <ul class="cart-includedServices">
                            @foreach ($room->includedServices as $service)
                                <li class="cart-icon-list">
                                    @if (sizeof($service->icon) > 0)
                                        <img class="cart-icon" src="{{ $service->icon[0]->path }}"
                                            alt="{{ $service->icon[0]->filename }}" title="{{ $service->name }}">
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        <div class="cart-bottom-wrapper">
                            {{-- Тип комнаты --}}
                            <div class="cart-roomType" id="open-modal-room_type-{{ $room->id }}">
                                {{ $room->roomType->name }} {{ $room->viewType->description }}
                            </div>
                            <div class="cart-description">
                                {{-- колличество взрослых --}}
                                <div class="cart-adults_max_guests cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/men.svg"
                                        alt="взрослые" title="Взрослые">
                                    <p class="cart-description-text">{{ $room->adults_max_guests }}</p>
                                </div>
                                {{-- колличество детей --}}
                                <div class="cart-adults_max_guests cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/child.svg"
                                        alt="дети" title="Дети">
                                    <p class="cart-description-text">{{ $room->children_max_guests }}</p>
                                </div>
                                {{-- полщадь комнаты --}}
                                <div class="cart-area cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/area.svg"
                                        alt="площадь" title="Площадь">
                                    <p class="cart-description-text">{{ $room->area }}m²</p>
                                </div>
                                {{-- Тип кровати --}}
                                <div class="cart-bed_type cart-description-text_icon_wrapper">
                                    <img class="cart-description-img" src="img/roomsSearch/cart-icons/bed.svg"
                                        alt="кровать" title="Кровати">
                                    <p class="cart-description-text">{{ $room->BedType->description }}</p>
                                </div>
                            </div>
                            <div class="cart-price">
                                {{-- Цена --}}
                                <div class="price-wrapper">
                                    <p class="tariff">RUB {{ $room->price }}</p>
                                    <p class="tariff-discount">RUB
                                        {{ round($room->price - ($room->price / 100) * 24, 2) }}
                                        24% savings </p>
                                </div>

                                <form action="{{ route('bookings.create') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
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
    <script>
        @foreach ($roomsList as $room)
            document.getElementById("open-modal-{{ $room->id }}", ).addEventListener("click", function() {
                document.getElementById("modal-{{ $room->id }}").classList.add("open")
            })
            document.getElementById("open-modal-room_type-{{ $room->id }}").addEventListener("click", function() {
                document.getElementById("modal-{{ $room->id }}").classList.add("open")
            })
            document.getElementById("close-modal-{{ $room->id }}").addEventListener("click", function() {
                document.getElementById("modal-{{ $room->id }}").classList.remove("open")
            })
        @endforeach
    </script>
@endsection
