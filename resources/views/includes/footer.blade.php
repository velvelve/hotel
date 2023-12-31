<!-- resources/views/components/footer.blade.php -->

<footer class="footer">
    <div class="footer_container">

            <div class="footer_logo">
                <img class="footer_img" src="{{ asset('img\footer\logo.png') }}" alt="logo">
                <p class="copyright">© {{ date('Y') }} LUXURY HOTEL</p>
            </div>

                <div>
                    <ul class="footer_list">
                        <li><a class="footer__link" href="{{ route('about-us') }}">Об отеле</a></li>
                        <li><a class="footer__link" href="{{ route('rooms.types') }}">Номера и цены</a></li>
                        <li><a class="footer__link" href="{{ route('restaurants') }}">Рестораны</a></li>
                        <li><a class="footer__link" href="{{ route('spa') }}">Спа</a></li>
                        <li><a class="footer__link" href="{{ route('legal-info')}}">Правовая информация</a></li>
                    </ul>
                </div>

                <div>
                    <ul class="footer_list">
                        <li><a class="footer__link" href="{{ route('conference-rooms') }}">Конференц-залы</a></li>
                        <li><a class="footer__link" href="{{ route('contacts.index') }}">Контакты</a></li>
                        <li><a class="footer__link" href="{{ route('rent') }}">Аренда</a></li>
                        <li><a class="footer__link" href="{{ route('services') }}">Услуги</a></li>
                    </ul>
                </div>

                <div class="footer__contacts">
                    <ul class="footer_list contacts">
                        <li class="adress">
                            <p>г. Москва, ул. Никольская, 123</p>
                        </li>
                        <li>
                            <a class="footer__link" href="tel:+78008008880">+7-800-800-88-80</a>
                        </li>
                        <li>
                            <a class="footer__link" href="mailto:info@luxuryhotel.ru">info@luxury_hotel.ru</a>
                        </li>
                    </ul>
                </div>

                <div class="social">
                    <p class="social_p">Связаться с нами</p>

                    <div class="social_link">
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\youtube.png') }}" alt="youtube"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\vk.png') }}" alt="vk"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\facebook.png') }}" alt="facebook"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\twitter.png') }}" alt="twitter"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\tiktok.png') }}" alt="tiktok"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\instagram.png') }}" alt="instagram"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\telegram.png') }}" alt="telegram"></a>
                        <a href="#"><img class="social__link-icon" src="{{ asset('img\footer\whatsapp.png') }}" alt="whatsapp"></a>
                    </div>

                </div>

        </div>

</footer>
