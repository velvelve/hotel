@extends('layouts.main')

@push('styles')
{{--    <link href="{{ asset('css/swiper/swiper-bundle.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/rooms/show.css') }}" rel="stylesheet">
@endpush

@section('content')
   <section class="container">
<div class="swiper mySwiper">
        <div class="swiper-wrapper wrapper">

                @foreach ($rooms as $room)
                    <div class="swiper-slide">

                        <div class="slider_in_slider">
                            <div style="padding: 100px">
                            <div class="swiper imgSwiper2">
                                <div class="swiper-wrapper">
                                @foreach ($room->images as $image)
                                        <div class="swiper-slide">
                                            <img class="show-img"  style="width: 690px" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                        </div>
                                @endforeach
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>

                            </div>
                            <div thumbsSlider="" class="swiper imgSwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($room->images as $image)
                                    <div class="swiper-slide">
                                        <img class="show-img-mini" style="width: 196px" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="description">
                            <h2>Номер {{ $room->room_type }}</h2>
                            <h2>Включены в стоимость:</h2>
                            @foreach ($room->includedServices as $service)
                                <div>{{ $service->name }}</div>
                            @endforeach
                            <h2>Дополнительные:</h2>
                            @foreach ($room->additionalServices as $service)
                                <div>{{ $service->name }}</div>
                                <div>Цена: {{ $service->price }}$</div>
                            @endforeach
                        </div>

                        <div class="show-icons">
                            @foreach ($room->includedServices as $service)
                                <img class="show-icon" src="{{ $service->icon()->path }}" alt="{{ $service->icon()->filename }}" />
                            @endforeach
                        </div>
                    </div>

                @endforeach
        </div>
       <div class="swiper-button-prev1"></div>
       <div class="swiper-button-next1"></div>
</div>
   </section>
{{--    <script src="{{ asset("https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js") }}"></script>--}}
    <script>
        var swiper = new Swiper(".mySwiper", {
            allowTouchMove:false,
            navigation: {
                nextEl: ".swiper-button-next1",
                prevEl: ".swiper-button-prev1",
            },
        });

        var i = new Swiper(".imgSwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            nested: true,
        });
        var d =new Swiper(".imgSwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: i,
            },
        });
    </script>
@endsection
