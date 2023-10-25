@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/rooms/types.css') }}" rel="stylesheet">
@endpush
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

@section('content')
    <div class="room_main_container">
        <div class="room_wrapper">
            @foreach ($rooms as $room)
                <div class="room_cart">
                    <div class="room-cart__modal" onclick="handleCloseModal('{{ $room->room_type }}')" id="modal-{{ $room->room_type }}">
                        <x-rooms.search :guests=$guests />
                    </div>
                    <div class="room-cart-container">
                        <div class="room_slider_wrapper">
                            <div class="img-slider {{ $room->room_type }}">
                                @foreach ($room->images as $image)
                                    <div class="room_cart_image">
                                        <img class="img" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                    </div>
                                @endforeach
                            </div>
                            <div class="img-slider-nav {{ $room->room_type }}-nav">
                                @foreach ($room->images as $image)
                                    <div class="room_cart_image">
                                        <img class="nav-img" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-wrapper">
                            <h2 class="title">Номер {{ $room->room_type }}</h2>
                            <p class="description">В номерах есть все необходимое для комфортного пребывания и спокойного
                                сна.
                                К вашим услугам большая кровать, принадлежности для приготовления чая и кофе и бесплатный
                                Wi-Fi,
                                Номера этой категории предлагаются с одной двуспальной кроватью или двумя кроватями Twin.
                            </p>
                            <div class="text-icon-wrapper">
                                <div class="description-small">макс. кол-во гостей:
                                    {{ $room->max_guest_count }} @if ($room->max_guest_count == 1 or $room->max_guest_count > 4)
                                        человек
                                    @else
                                        человека
                                    @endif,
                                    тип кровати: 2 кровати Twin, площадь: 15 m²
                                </div>
                                <div class="icons_wrapper">
                                    @foreach ($room->includedServices as $service)
                                        <img class="icon" src="{{ $service->icon[0]->path }}"
                                            alt="{{ $service->icon[0]->filename }}" title="{{ $service->name }}" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="room-cart-container-lower">
                        <div class="left-text">
                            <p class="tariff-title">Prepaid Members Only</p>
                            <p class="tariff">Описание тарифа</p>
                            <p class="tariff-description">
                                Только номер <br>
                                Возврату не подлежит <br>
                                Оплата баллами <br>
                            </p>
                        </div>
                        <button class="button" type="submit"
                            onclick="handleOpenModal('{{ $room->room_type }}')">Выбрать</button>
                        <div class="right-text right-text-wrapper">
                            <div class="price">
                                <p class="tariff-title">RUB {{ $room->price }}</p>
                                <p class="tariff">24% savings RUB {{ round($room->price - ($room->price / 100) * 24, 2) }}
                                </p>
                            </div>
                            <p class="tariff-description">
                                за ночь <br>
                                Включены налоги и сборы <br>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            @foreach ($rooms as $room)
                $('.{{ $room->room_type }}').slick({
                    draggable: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.{{ $room->room_type }}-nav'
                });
                $('.{{ $room->room_type }}-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.{{ $room->room_type }}',
                    focusOnSelect: true
                });
            @endforeach
        });

        let handleOpenModal = (room_type) => {
            let modalEl = document.getElementById('modal-' + room_type)

            switch (true) {
                case (room_type == 'Standard'):
                    modalEl.style.display = 'flex'
                    break;
                case (room_type == 'Superior'):
                    modalEl.style.display = 'flex'
                    break;
                case (room_type == 'Premium'):
                    modalEl.style.display = 'flex'
                    break;
                case (room_type == 'Lux'):
                    modalEl.style.display = 'flex'
                    break;
                case (room_type == 'Family'):
                    modalEl.style.display = 'flex'
                    break;
            }
        }

        let handleCloseModal = (room_type) => {
            let modalEl = document.getElementById('modal-' + room_type)

            switch (true) {
                case (room_type == 'Standard'):
                    modalEl.style.display = 'none'
                    break;
                case (room_type == 'Superior'):
                    modalEl.style.display = 'none'
                    break;
                case (room_type == 'Premium'):
                    modalEl.style.display = 'none'
                    break;
                case (room_type == 'Lux'):
                    modalEl.style.display = 'none'
                    break;
                case (room_type == 'Family'):
                    modalEl.style.display = 'none'
                    break;
            }
        }
    </script>
@endsection
