<!-- resources/views/components/footer.blade.php -->

<footer class="footer">
    <div class="footer_container">

        <div class="footer_top">

            <div class="footer_logo">
                <img class="footer_img" src="{{asset('img/von.png')}}" alt="logo">
                <p class="copyright">© {{ date('Y') }} LUXURY HOTEL</p>
            </div>

            <div class="footer_contacts">

                <div>
                    <ul class="footer_list">
                        <li><a href="{{ route('about') }}">Об отеле</a></li>
                        <li><a href="{{ route('rooms') }}">Номера и цены</a></li>
                        <li><a href="{{ route('restaurants') }}">Рестораны</a></li>
                        <li><a href="{{ route('spa') }}">Спа</a></li>
                        <li><a href="{{ route('legal') }}">Правовая информация</a></li>
                    </ul>
                </div>

                <div>
                    <ul class="footer_list">
                        <li><a href="{{ route('conference') }}">Конференц-залы</a></li>
                        <li><a href="{{ route('contacts') }}">Контакты</a></li>
                        <li><a href="{{ route('booking') }}">Бронирование</a></li>
                        <li><a href="{{ route('rent') }}">Аренда</a></li>
                        <li><a href="{{ route('services') }}">Услуги</a></li>
                    </ul>
                </div>

                <div>
                    <ul class="footer_list contacts">
                        <li class="adress">
                            <p>г. Москва, ул. Никольская, 123</p>
                        </li>
                        <li>
                            <a href="tel:+78008008880">+7-800-800-88-80</a>
                        </li>
                        <li>
                            <a href="mailto:info@luxuryhotel.ru">info@luxury_hotel.ru</a>
                        </li>
                    </ul>
                </div>

                <div class="social">
                    <p class="social_p">Связаться с нами</p>

                    <div class="social_link">
                        <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="youtube"></a>
                        <a href="#"><img src="{{ asset('images/vk.png') }}" alt="vk"></a>
                        <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="facebook"></a>
                        <a href="#"><img src="{{ asset('images/twitter.png') }}" alt="twitter"></a>
                        <a href="#"><img src="{{ asset('images/tiktok.png') }}" alt="tiktok"></a>
                        <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="instagram"></a>
                        <a href="#"><img src="{{ asset('images/telegram.png') }}" alt="telegram"></a>
                        <a href="#"><img src="{{ asset('images/whatsapp.png') }}" alt="whatsapp"></a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</footer>