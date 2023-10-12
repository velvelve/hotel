<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section-1">
        
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.homePageHeader.homePageHeader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('homePageHeader.homePageHeader'); ?>
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
        
        <div class="section-1-social">
            <div class="section-1-social__followUs">
                Follow us
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/instagram.svg"></a>
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/twitter.svg"></a>
            </div>
            <div class="section-1-social__link">
                <a href="#"><img src="/img/homePage/section1/facebook.svg"></a>
            </div>
        </div>
        <div class="section-1-welcomeText">
            <div class="section-1-welcomeText__welcome">
                Добро пожаловать!
            </div>
            <div class="section-1-welcomeText__name-hotel">
                <div class="section-1-welcomeText__name-hotel-top">
                    The Luxury hotel
                </div>
                <div class="section-1-welcomeText__name-hotel-bottom">
                    Resort & Spa Hotel
                </div>
            </div>
        </div>
        
        <div class="section-1-search">
            <?php if (isset($component)) { $__componentOriginal4956d9090668e90cf3ab0f621275a098 = $component; } ?>
<?php $component = App\View\Components\Rooms\Search::resolve(['guests' => $guests] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('rooms.search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Rooms\Search::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4956d9090668e90cf3ab0f621275a098)): ?>
<?php $component = $__componentOriginal4956d9090668e90cf3ab0f621275a098; ?>
<?php unset($__componentOriginal4956d9090668e90cf3ab0f621275a098); ?>
<?php endif; ?>
        </div>
        <div class="section-1-services">
            <div class="section-1-services__numbers">
                Элегантные номера
                <img src="/img/homePage/section1/numbers.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__restaurant">
                Ресторан
                <img src="/img/homePage/section1/restaurant.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__spa">
                SPA Place
                <img src="/img/homePage/section1/spa.svg" class="section-1-services__ico">
            </div>
            <div class="section-1-services__jacuzzi">
                Джакузи
                <img src="/img/homePage/section1/jacuzzi.svg" class="section-1-services__ico">
            </div>
        </div>
    </div>
    
    <div class="section-2">
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.slider.slider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('slider.slider'); ?>
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
        <div class="services">
            <div class="services-item">
                <img src="/img/homePage/section2/swim.svg" class="item-ico">
                <div class="item-description">
                    Бассейн
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/fitness.svg" class="item-ico">
                <div class="item-description">
                    Фитнес
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/restaurant.svg" class="item-ico">
                <div class="item-description">
                    Ресторан
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/transfer.svg" class="item-ico">
                <div class="item-description">
                    Трансфер
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/support.svg" class="item-ico">
                <div class="item-description">
                    Поддержка
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/spa.svg" class="item-ico">
                <div class="item-description">
                    Spa
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/wifi2.svg" class="item-ico">
                <div class="item-description">
                    Wifi
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/parking.svg" class="item-ico">
                <div class="item-description">
                    Паркинг
                </div>
            </div>
            <div class="services-item">
                <img src="/img/homePage/section2/service.svg" class="item-ico">
                <div class="item-description">
                    Сервис
                </div>
            </div>
        </div>
        <div class="service-carts">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.serviceCart.serviceCart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('serviceCart.serviceCart'); ?>
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
            <div class="service-cart-2">
                <div class="service-cart-description">
                    Расслабся в чистейшем бассейне с теплой водой и функцией гидромассажа
                </div>
            </div>
            <div class="service-cart-3">
                <div class="service-cart-description">
                    Попробуете стоун-терапию, скрабы, маски и обёртывания
                </div>
            </div>
            <div class="service-cart-4">
                <div class="service-cart-description">
                    Проведи время с пользой для тела в нашем новом тренажерном зале!
                </div>
            </div>
        </div>
    </div>
    
    <div class="section-3">
        <div class="section-3-carts">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.section3Cart.section3Cart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('section3Cart.section3Cart'); ?>
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
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/hot-stones.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Горячие камни
                </div>
                <div class="section-3-carts__item-description">
                    Расслабьтесь, восстановите силы и избавьтесь от стресса с помощью нашей роскошной услуги массажа
                    горячими камнями.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/face-therapy.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Терапия для лица
                </div>
                <div class="section-3-carts__item-description">
                    Откройте для себя свое естественное сияние и подарите молодую, обновленную кожу с помощью нашей
                    омолаживающей терапии для лица.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
            <div class="section-3-carts__item">
                <div class="section-3-carts__item-img">
                    <img src="/img/homePage/section3/cosmetic-procedures.svg" />
                </div>
                <div class="section-3-carts__item-name">
                    Косметические процедуры
                </div>
                <div class="section-3-carts__item-description">
                    Окунитесь в мир красоты и подчеркните свою естественную красоту с помощью наших изысканных косметических
                    процедур.
                </div>
                <div class="section-3-carts__item-btn">
                    <a href="#">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section-4">
        <div class="section-4-top">
            <div class="section-4-top__description">
                <div class="section-4-top__description-upperTitle">The Luxury hotel</div>
                <div class="section-4-top__description-downTitle">Лучший отель для тебя.</div>
                <div class="section-4-top__description-upperText">
                    LUXURY HOTEL - роскошный 5-звездочный отель, скрытая жемчужина, где есть возможность уединиться и
                    отдохнуть в элегантной обстановке.
                </div>
                <div class="section-4-top__description-downText">
                    «ВЕЛИКОЛЕПНОЕ РАСПОЛОЖЕНИЕ, ПРОСТОРНЫЕ НОМЕРА, ПЕРВОКЛАССНОЕ ОБСЛУЖИВАНИЕ — ОТЕЛЬ LUXURY HOTEL ПОКОРЯЕТ
                    СЕРДЦА НАВСЕГДА»
                </div>
            </div>
            <div class="section-4-top__img">
                <img src="/img/homePage/section4/section4-hotel.png">
            </div>
        </div>
        <div class="section-4-bottom">
            <div class="section-4-subscription">
                <div class="section-4-subscription__title">
                    Будь в курсе последних новостей
                    <div class="section-4-subscription__subscribeText">
                        Подпишись на нашу рассылку
                    </div>
                </div>
                <form action="#" class="section-4-subscription__form">
                    <div class="section-4-subscription__input">
                        <input type="text" placeholder="Введите Email-адрес" />
                    </div>
                    <button class="section-4-subscription__btn">ПОДПИСАТЬСЯ</button>
                </form>
            </div>
        </div>
    </div>
    <?php $__env->startPush('styles'); ?>
        <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/homePage/home.css')); ?>" rel="stylesheet">
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /hotel/resources/views/home/welcome.blade.php ENDPATH**/ ?>