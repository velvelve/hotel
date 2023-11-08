@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление местоположения</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.locations.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="country_id">Страна</label>
                <select class="form-control" name="country_id" id="country_id">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if ($country->id === old('country_id')) selected @endif>
                            {{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="city_id">Город</label>
                <select class="form-control" name="city_id" id="city_id">
                </select>
            </div>
            <div class="form-group">
                <label for="street">Улица</label>
                <input type="text" class="form-control" name="street" id="street" value="{{ old('street') }}">
            </div>
            <div class="form-group">
                <label for="house">Номер дома</label>
                <input type="text" class="form-control" name="house" id="house" value="{{ old('house') }}">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#country_id').on('change', function() {
                var countryId = $(this).val();
                $('#city_id').empty()
                $.ajax({
                    url: `${countryId}/city`,
                    success: data => {
                        data.cities.forEach(city =>
                            $('#city_id').append(`<option value="${city.id}">
                        ${city.name}</option>`)
                        )
                    },
                    error: function(req, err) {
                        console.log('my message' + err);
                    }
                })
            })
            var startId = $("#country_id option:first").val();
            $('#country_id').val(startId).change()
        })
    </script>
@endsection
