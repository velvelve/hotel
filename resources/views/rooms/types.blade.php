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
                    <div class="room-cart__modal" id="modal-{{ $room->roomTypeName }}">
                        <div class="modal-cart">
                            <x-rooms.search :guests="$guests" :typeRoom="$typeRoom" />
                        </div>
                    </div>
                    <div class="room-cart-container">
                        <div class="room_slider_wrapper">
                            <div class="img-slider {{$room->roomTypeName}}">
                            @foreach ($room->images as $image)
                            <div class="room_cart_image">
                                <img class="img"  src="{{ $image }}" alt="{{ $image }}">
                            </div>
                            @endforeach
                            </div>
                            <div class="img-slider-nav {{$room->roomTypeName}}-nav">
                                @foreach ($room->images as $image)
                                    <div class="room_cart_image">
                                        <img class="nav-img"  src="{{ $image }}" alt="{{ $image }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-wrapper">
                            <h2 class="title">Номер {{$room->roomTypeName}}</h2>
                            <p class="description">В номерах есть все необходимое для комфортного пребывания и спокойного
                                 сна.
                                 К вашим услугам большая кровать, принадлежности для приготовления чая и кофе и бесплатный
                                  Wi-Fi,
                                Номера этой категории предлагаются с одной двуспальной кроватью или двумя кроватями Twin.
                            </p>
                            <div class="text-icon-wrapper">
                                <div class="description-small">макс. кол-во гостей:
                                    {{$room->maxMaxGuests}} @if($room->maxMaxGuests == 1 or $room->maxMaxGuests > 4) человек @else человека @endif,
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
                            onclick="showModal('{{ $room->roomTypeName }}')">Выбрать</button>
                        <div class="right-text right-text-wrapper">
                            <div class="price">
                                <p class="tariff-title">RUB {{$room->minPrice}}</p>
                                <p class="tariff">24% savings RUB
                                    {{round($room->minPrice - ($room->minPrice / 100) * 24,2) }}
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
            $('.{{ $room->roomTypeName }}').slick({
                draggable: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.{{ $room->roomTypeName }}-nav'
            });
            $('.{{ $room->roomTypeName }}-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.{{ $room->roomTypeName }}',
                focusOnSelect: true
            });
            @endforeach
        });

        let showModal = (roomTypeName) => {
            let modalEl = document.getElementById('modal-' + roomTypeName)
            modalEl.style.display = 'flex'

            modalEl.children[0].children[0].children[1].children[0].children[1].children[1].click()

            let optionCollection = modalEl.getElementsByClassName('options')
            let requiredOption = modalEl.getElementsByClassName('option-' + roomTypeName)
            let optionArray = Array.from(optionCollection)

            optionArray.forEach(function(el){
                console.log(el == requiredOption[0])
                if (el == requiredOption[0]) {
                    el.setAttribute('selected', 'selected')
                    console.log(el)
                } else {
                    el.style.display = 'none'
                    el.removeAttribute('selected')
                }
            })

            modalEl.addEventListener('click', (e) => {
                if (e.target.id == 'modal-' + roomTypeName) {
                    modalEl.style.display = "none"
                }
            })
        }
    </script>
@endsection
