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
        <form method="POST" action="{{ route('admin.bookings.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label>Комната</label>
                <select class="form-control" name="room_id" id="room_id">
                    @foreach ($rooms as $room)
                        <option data-price="{{ $room->price }}"
                            data-count="{{ $room->adults_max_guests + $room->children_max_guests }}"
                            value="{{ $room->id }}" @if ($room->id === old('room_id')) selected @endif>
                            {{ $room->room_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Пользователь</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id === old('user_id')) selected @endif>
                            {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="check_in_date">Дата заезда</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date"
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('check_in_date') }}">
            </div>
            <div class="form-group">
                <label for="check_out_date">Дата выезда</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date"
                    min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" value="{{ old('check_out_date') }}">
            </div>
            <div class="form-group">
                <label for="client_first_name">Имя клиента</label>
                <input type="text" class="form-control" name="client_first_name" id="client_first_name"
                    value="{{ old('client_first_name') }}">
            </div>
            <div class="form-group">
                <label for="client_middle_name">Отчество клиента</label>
                <input type="text" class="form-control" name="client_middle_name" id="client_middle_name"
                    value="{{ old('client_middle_name') }}">
            </div>
            <div class="form-group">
                <label for="client_last_name">Фамилия клиента</label>
                <input type="text" class="form-control" name="client_last_name" id="client_last_name"
                    value="{{ old('client_last_name') }}">
            </div>
            <div class="form-group">
                <label for="client_phone">Телефон клиента</label>
                <input type="tel" class="form-control" name="client_phone" id="client_phone"
                    value="{{ old('client_phone') }}">
            </div>
            <div class="form-group">
                <label for="client_email">Email клиента</label>
                <input type="text" class="form-control" name="client_email" id="client_email"
                    value="{{ old('client_email') }}">
            </div>
            <div class="form-group">
                <label for="promo_code">Промо-код</label>
                <input type="text" class="form-control" name="promo_code" id="promo_code"
                    value="{{ old('promo_code') }}">
            </div>
            <div class="form-group">
                <label for="client_wishes">Пожелания клиента</label>
                <input type="text" class="form-control" name="client_wishes" id="client_wishes"
                    value="{{ old('client_wishes') }}">
            </div>
            <div class="form-group">
                <label for="guests_count">Количество гостей</label>
                <input type="number" class="form-control" name="guests_count" id="guests_count" min="1"
                    value="{{ old('guests_count') }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if (old('status') === 'забронировано') selected @endif>{{ 'забронировано' }}
                    </option>
                    <option @if (old('status') === 'подтверждено') selected @endif>{{ 'подтверждено' }}
                    </option>
                    <option @if (old('status') === 'отменено') selected @endif>{{ 'отменено' }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_price">Цена</label>
                <input type="number" step="0.01" class="form-control" name="total_price" id="total_price"
                    value="{{ old('total_price') }}" readonly>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            let initialStartDate = new Date();
            let initialEndDate = new Date();
            initialEndDate.setDate(initialStartDate.getDate() + 1);
            $('#check_in_date').val(initialStartDate.toISOString().split('T')[0]);
            $('#check_out_date').val(initialEndDate.toISOString().split('T')[0]);
            let initialRoom = $('#room_id').find('option:selected');
            let intialPrice = initialRoom.data('price');
            let initialTotalCount = initialRoom.data('count');
            $('#total_price').val(intialPrice);
            $('#guests_count').attr("max", initialTotalCount);


            $("#guests_count").on('input', function() {
                let currentValue = parseInt($(this).val());
                let maxValue = $(this).attr("max");
                if (currentValue > maxValue) {
                    $(this).val(maxValue);
                }
            });

            $('#room_id').on('change', function() {
                let selected = $(this).find('option:selected');
                let price = selected.data('price');
                let totalCount = selected.data('count');
                $('#total_price').val(price);
                $('#guests_count').attr("max", totalCount);
            })

            $('#check_in_date').on('change', function() {
                let startDate = new Date($(this).val());
                let endDate = new Date($('#check_out_date').val());
                if (endDate.getTime() <= startDate.getTime()) {
                    endDate.setDate(startDate.getDate() + 1);
                    var formatted = endDate.toISOString().split('T')[0];
                    $('#check_out_date').val(formatted);
                }
                let diffTime = Math.abs(endDate - startDate);
                let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                if (diffDays < 1) {
                    diffDays = 1;
                }
                let selected = $('#room_id').find('option:selected');
                let pricePerDay = selected.data('price');
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
                let selected = $('#room_id').find('option:selected');
                let pricePerDay = selected.data('price');
                let totalPrice = (diffDays * pricePerDay).toFixed(2);
                $('#total_price').val(totalPrice);
            })
        });
    </script>
@endsection
