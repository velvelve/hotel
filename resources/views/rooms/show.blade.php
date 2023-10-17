@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rooms/show.css') }}" rel="stylesheet">
@endpush

@section('content')
   <section class="container swiper mySwiper">

        <div class="swiper-wrapper wrapper">

                @foreach ($rooms as $room)
                    <div class="swiper-slide">

                        <div class="slider_in_slider">
                            <div class="swiper imgSwiper">
                                <div class="swiper-wrapper">
                                @foreach ($room->images as $image)
                                        <div class="swiper-slide">
                                            <img class="show-img"  style="width: 690px" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                        </div>
                                @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper imgSwiper2">
                                <div class="swiper-wrapper">
                                    @foreach ($room->images as $image)
                                    <div class="swiper-slide">
                                        <img class="show-img-mini" style="width: 196px" src="{{ $image->path }}" alt="{{ $image->filename }}">
                                    </div>
                                    @endforeach
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
       <div class="swiper-button-prev"></div>
       <div class="swiper-button-next"></div>
    </section>
    <script src="{{ asset("js/swiper/swiper-bundle.min.js") }}"></script>
    <script src="{{ asset("js/rooms/InitializeSwiper.js") }}"></script>
@endsection
