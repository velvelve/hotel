@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование номера</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.rooms.update', ['room' => $room]) }}" id="store_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="hotel_id">Отель</label>
                <span class="form-control" id="hotel_id">{{ $room->hotel->name }}</span>
            </div>
            <div class="form-group">
                <label for="room_number">Номер комнаты</label>
                <input type="number" max="599" data-forbidden-numbers="{{ $forbidden_numbers }}" class="form-control"
                    name="room_number" id="room_number" value="{{ $room->room_number }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="{{ $room->description }}">
            </div>
            <div class="form-group">
                <label for="area">Площадь</label>
                <input type="number" min="10" max="100" class="form-control" name="area" id="area"
                    value="{{ $room->area }}">
            </div>
            <div class="form-group">
                <label for="apartment_count">Количество комнат</label>
                <input type="number" min="1" max="6" class="form-control" name="apartment_count"
                    id="apartment_count" value="{{ $room->apartment_count }}">
            </div>
            <div class="form-group">
                <label for="name">Максимальное количество взрослых</label>
                <input type="number" min="1" max="5" class="form-control" name="adults_max_guests"
                    id="adults_max_guests" value="{{ $room->adults_max_guests }}">
            </div>
            <div class="form-group">
                <label for="name">Максимальное количество детей</label>
                <input type="number" min="0" max="5" class="form-control" name="children_max_guests"
                    id="children_max_guests" value="{{ $room->children_max_guests }}">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" max="50000" class="form-control" name="price" id="price"
                    value="{{ $room->price }}">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="availability" id="availability" value="1"
                    @if ($room->availability) checked @endif>
                <label for="availability">Доступность в поиске</label>
            </div>
            <div class="form-group">
                <label for="room_type_id">Тип номера</label>
                <select class="form-control" name="room_type_id" id="room_type_id">
                    @foreach ($room_types as $roomType)
                        <option value="{{ $roomType->id }}" @if ($roomType->id === $room->room_type_id) selected @endif>
                            {{ $roomType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="view_type_id">Тип вида из окна</label>
                <select class="form-control" name="view_type_id" id="view_type_id">
                    @foreach ($view_types as $viewType)
                        <option value="{{ $viewType->id }}" @if ($viewType->id === $room->view_type_id) selected @endif>
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
                <label>Фотографии номеров</label>
                <div class="row">
                    @foreach ($images as $image)
                        @php
                            $isRoomImage = false;
                            foreach ($room->images as $roomImage) {
                                if ($image->path === $roomImage->path) {
                                    $isRoomImage = true;
                                    break;
                                }
                            }
                        @endphp
                        <div class="col-md-3">
                            <div class="card mb-4">
                                <img class="p-2 bd-highlight" src="{{ $image->path }}" alt="{{ $image->filename }}"
                                    style="max-width: 100px" />
                                <div class="card-body">
                                    <input class="form-check-input" type="checkbox"
                                        name="selected_images{{ $image->id }}"
                                        id="selected_images{{ $image->id }}" value="{{ $image->path }}"
                                        @if ($isRoomImage) checked @endif>
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
            let $roomNumberInput = $('#room_number');

            $roomNumberInput.on('change', function() {
                let data = $roomNumberInput.data('forbidden-numbers');
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
