<div class="componentRoomsSearch">
    <div class="roomsSearch-head">
        Поиск номеров
    </div>
    <div class="roomsSearch-menu">
        <form action="<?php echo e(route('search.rooms')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="roomsSearch-menu__date">
                <div class="roomsSearch-menu__date-head">
                    <img src="/img/roomsSearch/date.svg">
                    <label for="date_range">Заезд - Выезд</label>
                </div>
                <input type="text" name="date_range" id="date_range" required>
            </div>

            <div class="roomsSearch-menu__guest">
                <div class="roomsSearch-menu__guest-head">
                    <img src="/img/roomsSearch/guest.svg">
                    <label for="guest_count">Кол-во гостей</label>
                </div>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <input type="number" name="guest_count" id="guest_count" value="<?php echo e((int) $guests); ?>"
                    >
            </div>
            <button type="submit" class="roomsSearch-menu__btn">Искать</button>

        </form>
    </div>
</div>

<script>
    $(function() {
        $('input[name="date_range"]').daterangepicker({
            autoApply: true,
            opens: 'center',
            minDate: new Date(),
        })
    });
</script>
<?php /**PATH /hotel/resources/views/components/rooms/search.blade.php ENDPATH**/ ?>