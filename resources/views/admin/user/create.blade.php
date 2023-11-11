@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.users.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}">
            </div>
            <div class="form-group">
                <label for="middle_name">Отчество</label>
                <input type="text" class="form-control" name="middle_name" id="middle_name"
                    value="{{ old('middle_name') }}">
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <input type="text" class="form-control" name="country" id="country" value="{{ old('country') }}">
            </div>
            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Дата рождения</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                    value="{{ old('date_of_birth') }}">
            </div>
            <div class="form-group">
                <label for="gender">Пол</label>
                <select class="form-control" name="gender" id="gender">
                    <option @if (old('gender') === \App\Enums\Users\Gender::MAN) selected @endif>{{ \App\Enums\Users\Gender::MAN->value }}
                    </option>
                    <option @if (old('gender') === \App\Enums\Users\Gender::WOMAN) selected @endif>{{ \App\Enums\Users\Gender::WOMAN->value }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="email_verified_at">Дата подтверждения email</label>
                <input type="date" class="form-control" name="email_verified_at" id="email_verified_at"
                    value="{{ old('email_verified_at') }}">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="text" class="form-control" name="password" id="password" value="{{ old('password') }}">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="discounts" id="discounts" value="1"
                    @if (old('discounts')) checked @endif>
                <label for="discounts">Получать уведомления о скидках</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="special_offers" id="special_offers" value="1"
                    @if (old('special_offers')) checked @endif>
                <label for="special_offers">Получать уведомления о спецпредложениях</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="bonus_earnings" id="bonus_earnings" value="1"
                    @if (old('bonus_earnings')) checked @endif>
                <label for="discounts">Получать уведомления о бонусах</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="feedback_responses" id="feedback_responses"
                    value="1" @if (old('feedback_responses')) checked @endif>
                <label for="feedback_responses">Получать уведомления об ответах на отзывы</label>
            </div>
            <div class="form-group">
                <label for="role_id">Роль</label>
                <select class="form-control" name="role_id" id="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($role->id === old('role_id')) selected @endif>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
