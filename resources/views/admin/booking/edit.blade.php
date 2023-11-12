@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление бронирования</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.bookings.update', ['booking' => $booking]) }}" id="store_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="room_id">Комната</label>
                <input style="display: none" type="text" data-price="{{ $booking->room()->price }}" class="form-control"
                    name="room_id" id="room_id" value="{{ $booking->room()->id }}" readonly>
                <span class="form-control">{{ $booking->room()->room_number }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">Пользователь</label>
                <input style="display: none" type="text" class="form-control" name="user_id" id="user_id"
                    value="{{ $booking->user()->id }}" readonly>
                <span class="form-control">{{ $booking->user()->email }}</span>
            </div>
            <div class="form-group">
                <label for="check_in_date">Дата заезда</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date"
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $booking->check_in_date }}">
            </div>
            <div class="form-group">
                <label for="check_out_date">Дата выезда</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date"
                    min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" value="{{ $booking->check_out_date }}">
            </div>
            <div class="form-group">
                <label for="client_first_name">Имя клиента</label>
                <input type="text" class="form-control" name="client_first_name" id="client_first_name"
                    value="{{ $booking->client_first_name }}">
            </div>
            <div class="form-group">
                <label for="client_middle_name">Отчество клиента</label>
                <input type="text" class="form-control" name="client_middle_name" id="client_middle_name"
                    value="{{ $booking->client_middle_name }}">
            </div>
            <div class="form-group">
                <label for="client_last_name">Фамилия клиента</label>
                <input type="text" class="form-control" name="client_last_name" id="client_last_name"
                    value="{{ $booking->client_last_name }}">
            </div>
            <div class="form-group">
                <label for="client_phone">Телефон клиента</label>
                <input type="tel" class="form-control" name="client_phone" id="client_phone"
                    value="{{ $booking->client_phone }}">
            </div>
            <div class="form-group">
                <label for="client_email">Email клиента</label>
                <input type="text" class="form-control" name="client_email" id="client_email"
                    value="{{ $booking->client_email }}">
            </div>
            <div class="form-group">
                <label for="promo_code">Промо-код</label>
                <input type="text" class="form-control" name="promo_code" id="promo_code"
                    value="{{ $booking->promo_code }}">
            </div>
            <div class="form-group">
                <label for="client_wishes">Пожелания клиента</label>
                <input type="text" class="form-control" name="client_wishes" id="client_wishes"
                    value="{{ $booking->client_wishes }}">
            </div>
            <div class="form-group">
                <label for="guests_count">Количество гостей</label>
                <input type="number" class="form-control" name="guests_count" id="guests_count" min="1"
                    max="{{ $booking->room()->adults_max_guests + $booking->room()->children_max_guests }}"
                    value="{{ $booking->guests_count }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if ($booking->status === 'забронировано') selected @endif>{{ 'забронировано' }}
                    </option>
                    <option @if ($booking->status === 'подтверждено') selected @endif>{{ 'подтверждено' }}
                    </option>
                    <option @if ($booking->status === 'отменено') selected @endif>{{ 'отменено' }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_price">Цена</label>
                <input type="number" step="0.01" class="form-control" name="total_price" id="total_price"
                    value="{{ $booking->total_price }}" readonly>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#check_in_date').on('change', function() {
                let startDate = new Date($(this).val());
                let endDate = new Date($('#check_out_date').val());
                if (endDate.getTime() <= startDate.getTime()) {
                    endDate.setDate(startDate.getDate() + 1);
                    let formatted = endDate.toISOString().split('T')[0];
                    $('#check_out_date').val(formatted);
                }
                let diffTime = Math.abs(endDate - startDate);
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays < 1) {
                    diffDays = 1;
                }
                let pricePerDay = $('#room_id').data('price');
                let totalPrice = (diffDays * pricePerDay).toFixed(2);
                $('#total_price').val(totalPrice);
            })

            $('#check_out_date').on('change', function() {
                let endDate = new Date($(this).val());
                let startDate = new Date($('#check_in_date').val());
                let today = new Date();
                if (endDate.setHours(0, 0, 0, 0) == today.setHours(0, 0, 0, 0)) {
                    endDate.setDate(today.getDate() + 1);
                    let endDateFormatted = endDate.toISOString().split('T')[0];
                    $('#check_out_date').val(endDateFormatted);
                }
                if (endDate.getTime() <= startDate.getTime()) {
                    startDate.setDate(endDate.getDate() - 1);
                    let startDateFormatted = startDate.toISOString().split('T')[0];
                    $('#check_in_date').val(startDateFormatted);
                }
                let diffTime = Math.abs(endDate - startDate);
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays < 1) {
                    diffDays = 1;
                }
                let pricePerDay = $('#room_id').data('price');
                let totalPrice = (diffDays * pricePerDay).toFixed(2);
                $('#total_price').val(totalPrice);
            })
        });
    </script>
@endsection
