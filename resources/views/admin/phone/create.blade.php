@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление телефона</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.phones.store') }}" id="store_form">
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
                <label for="number">Номер телефона</label>
                <input type="tel" class="form-control" name="number" id="number" value="{{ old('number') }}">
            </div>
            <div class="form-group">
                <label for="type">Тип телефона (отдел отеля)</label>
                <select class="form-control" name="type" id="type">
                    <option @if (old('type') === \App\Enums\Hotels\PhoneType::MAIN) selected @endif>{{ \App\Enums\Hotels\PhoneType::MAIN->value }}
                    </option>
                    <option @if (old('type') === \App\Enums\Hotels\PhoneType::BOOKING) selected @endif>
                        {{ \App\Enums\Hotels\PhoneType::BOOKING->value }}
                    </option>
                    <option @if (old('type') === \App\Enums\Hotels\PhoneType::SALES) selected @endif>
                        {{ \App\Enums\Hotels\PhoneType::SALES->value }}
                    </option>
                    <option @if (old('type') === \App\Enums\Hotels\PhoneType::RECEPTION) selected @endif>
                        {{ \App\Enums\Hotels\PhoneType::RECEPTION->value }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
