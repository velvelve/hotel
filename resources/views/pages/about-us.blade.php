@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/about.css') }}" rel="stylesheet">
@endpush

@section('content')

<section class="wrapper">
    <div class="section-about-the-company">
        <!-- Загаловок-->
        <h1 class="about-the-company-heading-main">О нас</h1>
        <div class="about-the-company-main">
            <!-- Текст с баннером на главной-->
            <img class="about-the-company-img-main" src="img/about/main.png" alt="company">
                <h1 class="about-the-company-title-heading">The Luxury Hotel</h1>
                <p class="about-the-company-title-text"> 
                    Является международной группой, признанной Forbes 4-м лучшим работодателем в 
                    индустрии путешествий и отдыха. Десять отличительных брендов. Более 1 160 действующих 
                    и строящихся отелей в регионе EMEA и APAC.</p>
        </div>
        <div class="section-about-the-company-one">
            <!-- Левая часть страницы-->
            <div class="about-the-company-info"> 
                <h1 class="about-the-company-heading">The Luxury Hotel — ваш первый выбор</h1>
                <p class="about-the-company-text">Наше долгосрочное видение заключается в том, чтобы быть компанией, 
                    которую выбирают гости, владельцы и таланты. Всякий раз, когда гость планирует поездку, 
                    инвестор или владелец думает о партнере, или когда кто-то ищет карьеру в индустрии 
                    гостеприимства, все они в первую очередь думают о The Luxury Hotel.
                </p>
            </div>
            <!--Правая часть страницы-->
            <div class="about-company-img">
                <img class="about-the-company-img" src="img/about/about-the-company1.png" alt="company1">
            </div>
        </div>
        <div class="section-about-the-company-two">
            <!-- Левая часть страницы-->
            <div class="about-company-img">
                <img class="about-the-company-img2" src="img/about/about-the-company2.png" alt="company2">
            </div>
            <!--Правая часть страницы-->
            <div class="about-the-company-info"> 
                <h1 class="about-the-company-heading">Важен каждый момент</h1>
                <p class="about-the-company-text">The Luxury Hotel — международная гостиничная группа с девятью 
                    различными гостиничными брендами, насчитывающая более 1100 действующих и строящихся 
                    отелей в регионе EMEA и APAC.
                </p>
                <p class="about-the-company-text">
                    В The Luxury Hotel мы привносим обновленную приверженность лидерству 
                    в сфере гостеприимства, чтобы соответствовать постоянно развивающейся 
                    индустрии туризма и индивидуальным потребностям наших гостей. 
                    </p>
            </div>
        </div>
        <div class="section-about-the-company-three">
            <!-- Левая часть страницы-->
            <div class="about-the-company-info"> 
                <h1 class="about-the-company-heading">Условия проживания</h1>
                <p class="about-the-company-text">
                    Обратите внимание, что при регистрации заезда гостям из России необходимо 
                    предъявить внутренний паспорт гражданина Российской Федерации. 
                    Заграничные паспорта не принимаются.Убедительно просим воздержаться от 
                    курения в Вашем номере и местах общего пользования в соответствии с российским 
                    законодательством. За генеральную антитабачную уборку номера взимается 
                    плата в размере от 25 000 рублей.
                </p>
            </div>
            <!--Правая часть страницы-->
            <div class="about-company-img">
                <img class="about-the-company-img" src="img/about/about-the-company3.png" alt="company3">
            </div>
        </div>
        <!--Блок с достижениями-->
        <div class="about-the-company-advantages">
            <div class="about-the-company-advantages">
                <p class="about-the-company-advantages-text">«Лучшая международная гостиничная группа»
                    GTA Norway 10-й год подряд
                </p>
            </div>
            <div class="about-the-company-advantages">
                <p class="about-the-company-advantages-text">4 место в рейтинге лучших работодателей мира 
                    в сфере путешествий и отдыха
                    Forbes 2022
                </p>
            </div>
            <div class="about-the-company-advantages">
                <p class="about-the-company-advantages-text">«Лучшая международная гостиничная группа»
                    GTA Norway 13-й год подряд
                </p>
            </div>
        </div>
        <!--Блок с текстом-->
        <div class="about-the-company-description">
            <p class="about-the-company-text-description">Роскошный отель воплощает красоту через уникальные 
                элементы в архитектуре, 
                просторные номера и люксы, авторскую кухню и великолепные виды. 
                Расположившись в самом сердце, The Luxury Hotel окружен достопримечательностями, 
                легендами и памятью об исторических событиях. Торжество русской культуры и искусства 
                начинается именно здесь, где в обновленном интерьере отеля перед гостями раскрывается 
                традиционное русское гостеприимство. Исследуйте лучшее, в пешей доступности от отеля: 
                богатое историческое наследие, динамичную архитектуру, авторские гастрономические 
                предложения, рестораны и бары, насыщенную ночную жизнь, премиальный шопинг, 
                многочисленные премьеры и культурные события мирового масштаба. Радушный прием 
                и эксклюзивные услуги отеля The Luxury Hotel сделают Ваше пребывание 
                действительно незабываемым.
            </p>
        </div>
    </div>
  
</section>

@endsection