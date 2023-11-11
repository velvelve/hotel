@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование изображения</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.images.update', ['image' => $image]) }}" id="store_form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Отель</label>
                <select class="form-control" name="hotel_id" id="hotel_id">
                    <option value="" @if ($image->hotel_id === null) selected @endif>Нет</option>
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" @if ($hotel->id === $image->hotel_id) selected @endif>
                            {{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Комната</label>
                <select class="form-control" name="room_id" id="room_id">
                    <option value="" @if ($image->room_id === null) selected @endif>Нет</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" @if ($room->id === $image->room_id) selected @endif>
                            {{ $room->room_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex form-group flex-column">
                <span>Текущее изображение</span>
                <img class="img-thumbnail" src="{{ $image->path }}" alt="{{ $image->filename }}"
                    style="max-width: 200px" />
                <label for="image">Новое изображение</label>
                <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="filename">Имя файла</label>
                <input type="text" class="form-control" name="filename" id="filename" value="{{ $image->filename }}">
            </div>
            <div class="form-group">
                <label>Выберите папку для сохранения изображения</label>
                <select class="form-control" name="destination_folder" id="destination_folder">
                    <option value="" @if ($image->hotel_id !== null || $image->room_id !== null) selected @endif>Нет</option>
                    @foreach ($subfolders as $subfolder)
                        <option value="{{ $subfolder }}" @if (pathinfo($image->path, PATHINFO_DIRNAME) === $subfolder) selected @endif>
                            {{ $subfolder }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#hotel_id").on("change", function() {
                if ($(this).val() !== "") {
                    $("#room_id").val("");
                }
                toggleDestinationFolderSelect();
            });

            $("#room_id").on("change", function() {
                if ($(this).val() !== "") {
                    $("#hotel_id").val("");
                }
                toggleDestinationFolderSelect();
            });

            function toggleDestinationFolderSelect() {
                if ($("#hotel_id").val() || $("#room_id").val()) {
                    $("#destination_folder").hide();
                    $("#destination_folder").val("");
                } else {
                    $("#destination_folder").show();
                    var first = $("#destination_folder option:eq(1)").val();
                    $("#destination_folder").val(first);
                }
            }

            $("#image").on("change", function() {
                const imageInput = $(this)[0];
                if (imageInput.files.length > 0) {
                    const fileName = imageInput.files[0].name;
                    const fileNameNoExt = fileName.split(".")[0];
                    $("#filename").val(fileNameNoExt);
                }
            });
        });
    </script>
@endsection
