<header class="header_container">
    <div class="header_content_container">
        <div class="header_logo">
            <div class="header_logo_background">
                <div class="header_logo_upper_text">LUXURY</div>
                <div class="header_logo_lower_text">HOTELS</div>
            </div>
        </div>
        <div class="header_menu">
            <ul class="header_list">
                <li><a href="<?php echo e(route('home')); ?>">Главная</a></li>
                <li><a href="<?php echo e(route('rooms.types')); ?>">Номера</a></li>
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
</header>
<?php /**PATH /hotel/resources/views/includes/header.blade.php ENDPATH**/ ?>