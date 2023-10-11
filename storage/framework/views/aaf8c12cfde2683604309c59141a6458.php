<div class="section-1-header">
    <div class="section-1-header__logo">
        <a href="<?php echo e(route('home')); ?>">
            <div class="section-1-header__logo-bg">
                <div class="section-1-header__logo-upperText">LUXURY</div>
                <div class="section-1-header__logo-lowerText">HOTELS</div>
            </div>
        </a>
    </div>
    <div class="section-1-header__menu">
        <ul>
            <li><a href="<?php echo e(route('home')); ?>">Главная</a></li>
            <li><a href="#">Номера</a></li>
            <li><a href="<?php echo e(route('contacts.index')); ?>">Контакты</a></li>
            <?php if(auth()->guard()->check()): ?>
                <li><a href="<?php echo e(route('profile')); ?>">Профиль</a></li>
                <li><a href="<?php echo e(route('logout')); ?>">Выйти</a></li>
            <?php else: ?>
                <li><a href="<?php echo e(route('login')); ?>">Войти</a></li>
                <li><a href="<?php echo e(route('register')); ?>">Регистрация</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH /hotel/resources/views/components/homePageHeader/homePageHeader.blade.php ENDPATH**/ ?>