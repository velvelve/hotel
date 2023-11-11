@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление номера</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.rooms.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="hotel_id">Отель</label>
                <select class="form-control" name="hotel_id" id="hotel_id">
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" @if ($hotel->id === old('hotel_id')) selected @endif>
                            {{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="room_number">Номер комнаты</label>
                <input type="number" max="599" data-forbiden-numbers="" class="form-control" name="room_number"
                    id="room_number" value="{{ old('room_number') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="number" min="10" max="100" class="form-control" name="area" id="area"
                    value="{{ old('area') }}">
            </div>
            <div class="form-group">
                <label for="apartment_count">Количество комнат</label>
                <input type="number" min="1" max="6" class="form-control" name="apartment_count"
                    id="apartment_count" value="{{ old('apartment_count') }}">
            </div>
            <div class="form-group">
                <label for="name">Максимальное количество взрослых</label>
                <input type="number" min="1" max="5" class="form-control" name="adults_max_guests"
                    id="adults_max_guests" value="{{ old('adults_max_guests') }}">
            </div>
            <div class="form-group">
                <label for="name">Максимальное количество детей</label>
                <input type="number" min="0" max="5" class="form-control" name="children_max_guests"
                    id="children_max_guests" value="{{ old('children_max_guests') }}">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" max="50000" class="form-control" name="price" id="price"
                    value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="availability" id="availability" value="1"
                    checked>
                <label for="availability">Доступность в поиске</label>
            </div>
            <div class="form-group">
                <label for="room_type_id">Тип номера</label>
                <select class="form-control" name="room_type_id" id="room_type_id">
                    @foreach ($room_types as $roomType)
                        <option value="{{ $roomType->id }}" @if ($roomType->id === old('room_type_id')) selected @endif>
                            {{ $roomType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="view_type_id">Тип вида из окна</label>
                <select class="form-control" name="view_type_id" id="view_type_id">
                    @foreach ($view_types as $viewType)
                        <option value="{{ $viewType->id }}" @if ($viewType->id === old('view_type_id')) selected @endif>
                            {{ $viewType->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="bed_type_id">Тип кроватей</label>
                <select class="form-control" name="bed_type_id" id="bed_type_id">
                    @foreach ($bed_types as $bedType)
                        <option value="{{ $bedType->id }}" @if ($bedType->id === old('bed_type_id')) selected @endif>
                            {{ $bedType->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Фотографии номера</label>
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img class="p-2 bd-highlight" src="{{ $image->path }}" alt="{{ $image->filename }}"
                                    style="max-width: 100px" />
                                <div class="card-body">
                                    <input class="form-check-input" type="checkbox"
                                        name="selected_images{{ $image->id }}"
                                        id="selected_images{{ $image->id }}" value="{{ $image->path }}">
                                    <label for="selected_images{{ $image->id }}"> {{ $image->path }}</label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            let $hotelSelect = $('#hotel_id');
            let $roomNumberInput = $('#room_number');
            let initialSelectedHotel = $hotelSelect.find('option:selected');
            let intialSelectedHotelId = initialSelectedHotel.val();

            $.get(intialSelectedHotelId + '/room-numbers', function(data) {
                if (data.length > 0) {
                    $roomNumberInput.data('forbiden-numbers', data);
                }
            });

            $hotelSelect.on('change', function() {
                let selectedHotelId = $hotelSelect.val();
                $.get(selectedHotelId + '/room-numbers', function(data) {
                    if (data.length > 0) {
                        $roomNumberInput.data('forbiden-numbers', data);
                    }
                });
            });

            $roomNumberInput.on('change', function() {
                let data = $roomNumberInput.data('forbiden-numbers');
                if (data.includes($roomNumberInput.val())) {
                    $roomNumberInput.val('');
                }
            });

            $('#store_form').submit(function(event) {
                event.preventDefault();
                let selectedImagePaths = [];
                $('[name^="selected_images"]').each(function() {
                    if ($(this).is(':checked')) {
                        let imagePath = $(this).val();
                        selectedImagePaths.push(imagePath);
                    }
                });
                $('[name="selected_image_paths"]').remove();
                selectedImagePaths.forEach(function(imagePath) {
                    $('#store_form').append(
                        '<input type="hidden" name="selected_image_paths[]" value="' +
                        imagePath + '">');
                });
                this.submit();
            });
        });
    </script>
@endsection
