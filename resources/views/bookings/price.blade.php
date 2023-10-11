@extends('layouts.main')

@section('content')
    <h1>Оформление бронирования</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert :message="$error" type="danger"></x-alert>
        @endforeach
    @endif
    <form role="form" action="{{ route('bookings.pay') }}" method="post" class="require-validation" data-cc-on-file="false"
        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf
        <div>К оплате: {{ $price }} </div>
        <div class='form-row row'>
            <div class='col-xs-12 col-md-6 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text' value="Test">
            </div>
            <div class='col-xs-12 col-md-6 form-group required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='20' type='text'
                    value="4242424242424242">
            </div>
        </div>
        <div class='form-row row'>
            <div class='col-xs-12 col-md-4 form-group cvc required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'
                    value="123">
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Month</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' value="04">
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Expiration Year</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'
                    value="2024">
            </div>
        </div>
        <div style="display: none" class="form-group d-none">
            <label for="check_in_date">ID user</label>
            <input type="text" name="check_in_date" id="check_in_date" class="form-control" value="{{ $check_in_date }}"
                required>
        </div>
        <div style="display: none" class="form-group d-none">
            <label for="check_out_date">ID user</label>
            <input type="text" name="check_out_date" id="check_out_date" class="form-control"
                value="{{ $check_out_date }}" required>
        </div>
        <div style="display: none" class="form-group d-none">
            <label for="room_id">ID user</label>
            <input type="number" name="room_id" id="room_id" class="form-control" value="{{ $room_id }}" required>
        </div>
        <div style="display: none" class="form-group d-none">
            <label for="user_id">ID user</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $user_id }}" required>
        </div>
        <div style="display: none" class="form-group d-none">
            <label for="guests_count">ID user</label>
            <input type="number" name="guests_count" id="guests_count" class="form-control" value="{{ $guests_count }}"
                required>
        </div>
        <div class="form-row row">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay
                    Now</button>
            </div>
        </div>
    </form>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
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
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $form.append("<input type='text' name='stripeToken' value='" + response.error.message + "'/>");
                } else {
                    var token = response['id'];
                    if (token) {
                        var x = $(this).data('price');
                        $form.append("<input type='text' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            }
        });
    </script>

@endsection
