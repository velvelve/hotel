@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/spa.css') }}" rel="stylesheet">
@endpush

@section('content')
<section class="wrapper">
<!--Первая секция-->
    <section class="main-section">
<!--Банер с заголовком-->
        <div class="main-section_screensaver">
            <h1 class="screensaver_text text_h1">The Luxury Spa</h1>
        </div>
<!--Описание-->
        <div class="mail-section_content">
            <p class="content_text">К услугам гостей инкрустированный кристаллами Swarovski бассейн, джакузи, парная, сауна с гималайской солью. </p>
            <p class="content_text">Когда один сезон сменяется другим, Вам и Вашему телу требуется особый уход и забота. Чтобы скрасить дождливые московские будни и насладиться идеальным сочетанием роскоши и релаксации, загляните в The Luxury Spa. В обновленной коллекции спа-ритуалов Вы найдете авторские массажи и уходовые процедуры для лица и тела, разработанные в сотрудничестве с премиальными брендами Valmont, HöbePergh и Thalgo. </p>
            <p class="content_text">К услугам гостей инкрустированный кристаллами Swarovski бассейн, джакузи, парная, сауна с гималайской солью, душ с ароматерапией, специализированное спа-кафе с меню здорового питания, салон красоты Веры Шубич, Beauty & Retail Studio, в которой вы можете приобрести понравившуюся во время ухода косметику, и современная фитнес-студия.</p>
        </div>
    </section>
<!--Вторая секция-->
    <section class="second-section">
<!--Спа-->
        <div class="second-section_spa">
<!--Изображение-->
            <div class="spa_img">
                <img class="img"  src="img/spa/photo1.png" alt="spa">
            </div>
<!--Описание-->
            <div class="spa_description">
                <h2 class="description_heading">Спа-люкс</h2>
                <p class="description_text">Премьера осени. The Luxury Spa приглашает Вас открыть для себя новые впечатления в дизайнерском спа-пространстве. </p>
                <p class="description_text">Осенью The Luxury Spa приглашает Вас открыть для себя совершенно новые впечатления в роскошном пространстве. Дизайнерский спа-люкс обещает задействовать все Ваши чувства и подарить наслаждение благодаря аутентичным спа-ритуалам и персонализированному сервису в приватной обстановке.</p>
            </div>
        </div>
<!--Сауна-->
        <div class="second-section_sauna">
<!--Описание-->
            <div class="sauna_description">
                <h2 class="heading_sauna">Сауна и хамам</h2>
                <p class="text_sauna">Сауна с гималайской солью, хамам и ледяной фонтан укрепят иммунитет и дадут заряд бодрости.</p>    
            </div>
<!--Изображение-->
            <div class="sauna_img">
                <img class="img"  src="img/spa/photo2.png" alt="sauna">
            </div>
        </div>   
    </section>
<!--Третья секция-->
    <section class="third-section">
<!--Бассейн-->
        <div class="third-section_swimming">
<!--Изображение-->
            <div class="swimming_img">
                <img  class="img" src="img/spa/photo3.png" alt="swimming">
            </div>
<!--Описание-->
            <div class="swimming_description">
                <h2 class="description_heading ">Бассейн</h2>
                <p class="description_text">
                Инкрустированный кристаллами Swarovski бассейн, джакузи и душ с ароматерапией помогут восстановить силы после интенсивной тренировки.</p>
            </div>
        </div>
<!--Фитнес-->
        <div class="third-section_fitness">
<!--Описание-->
            <div class="fitness_description">
                <h2 class="description_heading">Фитнес</h2>
                <p class="description_text">Если Вам не хватает мотивации, чтобы заниматься спортом, то клубное членство в нашем спа станет истинным наслаждением.</p>
                <p class="description_text">Неограниченное количество посещений фитнес студии, оборудованной тренажерами Technogym, и индивидуальные комплексные программы от сертифицированных инструкторов превратят тренировки в удовольствие.</p>    
            </div>
<!--Изображение-->
            <div class="fitness_img ">
                <img class="img" src="img/spa/photo4.png" alt="fitness">
            </div>
        </div>   
    </section>
<!--Четвертая секция-->
    <section class="fourth-section">
<!--Кафе-->
        <div class="fourth-section_cafe">
<!--Изображение-->
            <div class="cafe_img">
                <img class="img" src="img/spa/photo5.png" alt="cafe">
            </div>
<!--Описание-->
            <div class="cafe_description">
                <h2 class="description_heading">Спа-кафе</h2>
                <p class="description_text">
                Не торопитесь и загляните в спа-кафе, чтобы насладиться травяным чаем или перекусить блюдами из Wellness меню, разработанного совместно с известным нутрициологом.</p>
            </div>
        </div>
<!--Часы работы-->
        <div class="fourth-section_work">
            <p class="description_text">Время работы:</p>
            <p class="description_text">Зона спа открыта с 07:00 до 23:00 </p>
            <p class="description_text">Спортивный зал работает круглосуточно для гостей, проживающих в отеле </p>
            <p class="description_text">Спа-уход осуществляется с 10:00 до 22:00</p>
        </div>
    </section>
    <div class="img_background">
        <img class="background" src="img/spa/background.png" alt="">
    </div>
</section>

@endsection