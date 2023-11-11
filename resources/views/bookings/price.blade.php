@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/booking/payment.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    @if ($stripe_error !== null && $stripe_error !== '')
        <x-alert :message="$stripe_error" type="danger"></x-alert>
    @endif

    <section class="payment">
        <div class="payment__wrp">
            <div class="payment__logo"></div>

            <div>
                <img src="{{ asset('img\auth\img.png') }}" alt="photo-hotel">
            </div>

            <div class="payment__info">
                <a class="payment__link-back" href="javascript:history.back()">
                    <span class="payment__link-arrow">&lsaquo;</span>Назад
                </a>
                <h1 class="payment__title">Оплата бронирования</h1>

                <form role="form" action="{{ route('bookings.pay') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf

                    <p class="payment__text">К оплате: <strong>{{ $price * $days }}</strong></p>

                    <div class="payment__input-container">
                        <label class='payment__label'>Введите номер карты</label>
                        <input class='payment__input' id="card_number" pattern="\ d*" autocomplete='off' maxlength="19"
                            type='text' value="4242 4242 4242 4242">
                    </div>

                    <div class="payment__flex">

                        <div class="payment__input-container payment__input-container_mod">
                            <label for="payment__input" class='payment__label'>Месяц/год</label>
                            <div class="payment__input">
                                <input class='payment__input card-expiry-month' name="card-month" id="card-month"
                                    type="text" pattern="\d{2}" maxlength="2" placeholder="ММ" size='2'
                                    value="04" required>
                                /
                                <input class="payment__input card-expiry-year" name="card-year" id="card-year"
                                    size='4' type="text" pattern="\d{4}" maxlength="4" placeholder="ГГГГ"
                                    value="2024" required>
                            </div>
                        </div>

                        <div class="payment__input-container payment__input-container_mod">
                            <label class='payment__label'>CVC</label>
                            <input class='payment__input card-cvc' autocomplete='off' placeholder='ex. 311' size='4'
                                type='text' value="123">
                        </div>

                    </div>

                    <div class="payment__input-container">
                        <label class='payment__label'>Владелец карты</label>
                        <input class='payment__input' size='4' type='text' placeholder="введите фамилию и имя"
                            value="Test">
                    </div>

                    <div class="payment__input-container">
                        <label class="payment__label" for="email">E-mail для получения чека</label>
                        <input class="payment__input" type="email" name="email" id="email"
                            placeholder="введите e-mail">
                    </div>

                    <label class="payment__ticket">
                        <input type="checkbox" name="receive_receipt" value="yes">
                        получить квитанцию на электронную почту
                    </label>

                    <!--Скрытые input-->
                    <div style="display: none">
                        <label for="check_in_date">check_in_date</label>
                        <input type="text" name="check_in_date" id="check_in_date" value="{{ $check_in_date }}" required>

                        <label for="check_out_date">check_out_date</label>
                        <input type="text" name="check_out_date" id="check_out_date" value="{{ $check_out_date }}"
                            required>

                        <label for="last_name">last_name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $last_name }}" required>

                        <label for="first_name">first_name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $first_name }}" required>

                        <label for="patronymic_name">patronymic_name</label>
                        <input type="text" name="patronymic_name" id="patronymic_name" value="{{ $patronymic_name }}"
                            required>

                        <label for="tel">tel</label>
                        <input type="tel" name="tel" id="tel" value="{{ $tel }}" required>

                        <label for="email">email</label>
                        <input type="email" name="email" id="email" value="{{ $email }}" required>

                        <label for="promo_code">promo_code</label>
                        <input type="text" name="promo_code" id="promo_code" value="{{ $promo_code }}">

                        <label for="wishes">wishes</label>
                        <input type="text" name="wishes" id="wishes" value="{{ $wishes }}">

                        <label for="room_id">room_id</label>
                        <input type="number" name="room_id" id="room_id" value="{{ $room_id }}" required>

                        <label for="user_id">user_id</label>
                        <input type="number" name="user_id" id="user_id" value="{{ $user_id }}" required>

                        <label for="guests_count">guests_count</label>
                        <input type="number" name="guests_count" id="guests_count" value="{{ $guests_count }}"
                            required>
                        <label for="total_price">total_price</label>
                        <input type="number" name="total_price" id="total_price" value="{{ $price }}" required>
                    </div>

                    <button class="payment__button" type="submit">Оплатить</button>

                </form>
            </div>
            <div class="toast-container toast-hidden" id="toast">
                <div class="toast-header" id="toast_header">
                    <strong class="toast-title" id="toast_title">Сообщение</strong>
                </div>
                <div class="toast-body" id="toast_body">
                    <span class="toast-message" id="toast_message">Текст события!</span>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            hideLoading();
            $('#card_number').on('input', function() {
                let currentValue = $(this).val().replaceAll(' ', '');
                let formattedNumber = currentValue.split('').reduce((seed, next, index) => {
                    if (index !== 0 && !(index % 4)) seed += " ";
                    return seed + next;
                }, '')
                $(this).val(formattedNumber);
            });
        });


        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]',
                        'input[type=file]', 'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    showLoading()
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                $('#toast').removeClass('toast-hidden')
                $('#toast').addClass('animate')
                $('#toast').addClass('pop')
                if (response.error) {
                    hideLoading();
                    $('#toast').addClass('toast-error')
                    $('#toast_header #toast_title').text('Произошла ошибка!');
                    $('#toast_body #toast_message').text(response.error.message);
                    $('#toast-title').text = 'Произошла ошибка!'
                } else {
                    var token = response['id'];
                    if (token) {
                        $('#toast_header #toast_title').text('Обработка...');
                        $('#toast_body #toast_message').text('Передаём данные в банк');
                        $form.append("<input style='display: none' type='text' name='stripeToken' value='" + token +
                            "'/>");
                        $form.get(0).submit();
                    }
                }
                setTimeout(() => {
                    $('#toast').removeClass('toast-error')
                    $('#toast').addClass('toast-hidden')
                }, 2000);
            }
        });
    </script>
@endsection
