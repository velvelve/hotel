<div class="slider">
    <a class="slider-btn">
        <img src="/img/homePage/section2/polygon-left.svg" class="slider-btn-img">
    </a>
    <!-- Загрузка номеров -->
    <x-sliderCart.sliderCart />
    @foreach ($rooms as $room)
        <div class="slider-cart">
            <img src="{{ $room->images[0]->path }}" class="cart-img" />
            <div class="slider-cart-description">
                <div class="description-wrapper">
                    <!-- Загрузка уровня номера -->
                    <div class="description-level">Номер {{ $room->room_type }}</div>
                    <!-- Загрузка верхнего описания -->
                    <div class="description-upperText">18 m2 | 1 кровать Queen | 2 взрослых, 1 ребенок (0-11
                        лет)
                    </div>
                    <!-- Загрузка иконок -->
                    <div class="description-icons">
                        @foreach ($room->includedServices as $service)
                            <div class="description-icon-container">
                                <img src="{{ $service->icon()->path }}" class="description-ico">
                            </div>
                        @endforeach
                    </div>
                    <!-- Загрузка нижнего описания -->
                    <div class="description-lowerText">В номерах Standart есть все необходимое для комфортного
                        пребывания и спокойного сна.</div>
                </div>
            </div>
        </div>
    @endforeach
    <a class="slider-btn">
        <img src="/img/homePage/section2/polygon-right.svg" class="slider-btn-img">
    </a>
</div>
