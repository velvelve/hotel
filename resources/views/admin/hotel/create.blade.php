@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление отеля</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.hotels.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="location_id">Локация</label>
                <select class="form-control" name="location_id" id="location_id">
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" @if ($location->id === old('location_id')) selected @endif>
                            {{ $location->country->name }} {{ $location->city->name }} {{ $location->street }}
                            {{ $location->house }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
