@extends('layouts.main')

@section('content')
    <h1>Оформление бронирования</h1>

    @if($errors->any())
            @foreach($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
    @endif

    <form action="{{ route('bookings.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="check_in_date">Дата заезда:</label>
            @error('check_in_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="date" name="check_in_date" id="check_in_date" class="form-control" value="{{ $check_in_date }}">
        </div>

        <div class="form-group">
            <label for="check_out_date">Дата выезда:</label>
            @error('check_out_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="date" name="check_out_date" id="check_out_date" class="form-control" value="{{ $check_out_date }}"  >
        </div>

        <div class="form-group">
            <label for="last_name">Фамилия:</label>
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name}}" >
        </div>

        <div class="form-group">
            <label for="first_name">Имя:</label>
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name}}" >
        </div>

        <div class="form-group">
            <label for="guests_count">Количество гостей:</label>
            @error('guests_count')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" name="guests_count" id="guests_count" class="form-control" value="{{ $guest_count }}" >
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" >
        </div>

        <div class="form-group">
            <label for="room_type">Комната</label>
            @error('room_type')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="room_type" id="room_type" class="form-control" value="{{ $room->room_type }}" >
        </div>

        <!-- Поле room_id и user_id надо скрыть. В них данные подтянутся сами -->
        <div style="display: none" class="form-group d-none">
            <label for="room_id">ID room</label>
            @error('room_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" name="room_id" id="room_id" class="form-control" value="{{ $room->id }}" >
        </div>

        <div style="display: none" class="form-group d-none">
            <label for="user_id">ID user</label>
            @error('user_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $user->id }}" >
        </div>

        <button type="submit" class="btn btn-primary">Перейти к оплате</button>
    </form>
@endsection
