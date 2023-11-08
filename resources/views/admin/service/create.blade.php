@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление сервиса</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.services.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="name">Описание</label>
                <input type="text" class="form-control" name="full_description" id="full_description"
                    value="{{ old('full_description') }}">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="name">Константа</label>
                <input type="text" class="form-control" name="constant" id="constant" value="{{ old('constant') }}">
            </div>
            <div class="form-group">
                <label for="icon">Иконка сервиса</label>
                <div class="mb-3 row">
                    <img class="col-sm-2 col-form-label" src="#" alt="#" id="icon-image"
                        style="max-width: 100px" />
                    <div class="col">
                        <select class="form-control" name="icon" id="icon">
                            @foreach ($images as $image)
                                <option value="{{ $image->id }}" data-image="{{ $image->path }}"
                                    @if ($image->id === old('icon')) selected @endif>
                                    {{ $image->path }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Дополнительные изображения</label>
                @foreach ($images as $image)
                    <div class="d-flex flex-wrap flex-row bd-highlight mb-3">
                        <img class="p-2 bd-highlight" src="{{ $image->path }}" alt="{{ $image->filename }}"
                            style="max-width: 100px" />
                        <div class="p-2 bd-highlight">
                            <input class="form-check-input" type="checkbox" name="selected_images{{ $image->id }}"
                                id="selected_images{{ $image->id }}" value="{{ $image->id }}">
                            <label for="selected_images{{ $image->id }}"> {{ $image->path }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let initialIconSelected = $('#icon').find('option:selected');
            let intialImagePath = initialIconSelected.data('image');
            $('#icon-image').attr('src', intialImagePath);

            $('#icon').change(function() {
                let selectedOption = $(this).find(':selected');
                let imagePath = selectedOption.data('image');

                $('#icon-image').attr('src', imagePath);
            });
            $('#store_form').submit(function(event) {
                event.preventDefault();
                var selectedImageIds = [];
                $('[name^="selected_images"]').each(function() {
                    if ($(this).is(':checked')) {
                        var imageId = $(this).attr('name').replace('selected_images', '');
                        selectedImageIds.push(imageId);
                    }
                });
                $('[name="selected_image_ids"]').remove();
                selectedImageIds.forEach(function(imageId) {
                    $('#store_form').append(
                        '<input type="hidden" name="selected_image_ids[]" value="' +
                        imageId + '">');
                });
                this.submit();
            });
        });
    </script>
@endsection
