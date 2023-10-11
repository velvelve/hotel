<div class="slider">
    <a class="slider-btn">
        <img src="/img/homePage/section2/polygon-left.svg" class="slider-btn-img">
    </a>
    <!-- Загрузка номеров -->
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sliderCart.sliderCart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sliderCart.sliderCart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <div class="slider-cart">
        <!-- Загрузка изображения -->
        <img src="/img/homePage/section2/cart-img.png" class="cart-img" />
        <div class="slider-cart-description">
            <div class="description-wrapper">
                <!-- Загрузка уровня номера -->
                <div class="description-level">Номер SUPERIOR</div>
                <!-- Загрузка верхнего описания -->
                <div class="description-upperText">23 m2 | 2 кровати TWIN или 1 кровать Queen
                    | 2 взрослых, 1 ребенок (0-11 лет)</div>
                <!-- Загрузка иконок -->
                <div class="description-icons">
                    <img src="/img/homePage/section2/slippers.svg" class="description-ico">
                    <img src="/img/homePage/section2/kettle.svg" class="description-ico">
                    <img src="/img/homePage/section2/wifi.svg" class="description-ico">
                    <img src="/img/homePage/section2/tv.svg" class="description-ico">
                    <img src="/img/homePage/section2/hair-dryer.svg" class="description-ico">
                </div>
                <!-- Загрузка нижнего описания -->
                <div class="description-lowerText">Если вам необходим дополнительный комфорт, забронируйте номер
                    Superior. В этом номере есть все, что вам нужно.</div>
            </div>
        </div>
    </div>
    <div class="slider-cart">
        <!-- Загрузка изображения -->
        <img src="/img/homePage/section2/cart-img.png" class="cart-img" />
        <div class="slider-cart-description">
            <div class="description-wrapper">
                <!-- Загрузка уровня номера -->
                <div class="description-level">Номер PREMIUM</div>
                <!-- Загрузка верхнего описания -->
                <div class="description-upperText">30 m2 | 2 кровати TWIN или 1 кровать Queen
                    | 2 взрослых, 1 ребенок (0-11 лет)</div>
                <!-- Загрузка иконок -->
                <div class="description-icons">
                    <img src="/img/homePage/section2/slippers.svg" class="description-ico">
                    <img src="/img/homePage/section2/kettle.svg" class="description-ico">
                    <img src="/img/homePage/section2/wifi.svg" class="description-ico">
                    <img src="/img/homePage/section2/tv.svg" class="description-ico">
                    <img src="/img/homePage/section2/hair-dryer.svg" class="description-ico">
                    <img src="/img/homePage/section2/safe.svg" class="description-ico">
                </div>
                <!-- Загрузка нижнего описания -->
                <div class="description-lowerText">Наши номера Premium подойдут тем, кто любит просторные
                    помещения и дополнительный комфорт.</div>
            </div>
        </div>
    </div>
    <a class="slider-btn">
        <img src="/img/homePage/section2/polygon-right.svg" class="slider-btn-img">
    </a>
</div><?php /**PATH /hotel/resources/views/components/slider/slider.blade.php ENDPATH**/ ?>