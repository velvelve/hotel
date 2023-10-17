<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel</title>

    <style>
    </style>

    <script src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Manrope:wght@300;500;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300;400&display=swap"
        rel="stylesheet">

    <link href="<?php echo e(asset('css/roomsSearch/roomsSearch.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/searchResult/searchResult.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <?php if(Request::route()->getName() !== 'home'): ?>
        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <main>
        <div>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</body>


</html>
<?php /**PATH /hotel/resources/views/layouts/main.blade.php ENDPATH**/ ?>