@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление настроек уведомлений</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.notification-preference.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="user_id">Пользователь</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id === old('user_id')) selected @endif>
                            {{ $user->first_name }} {{ $user->last_name }}: {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="discounts" id="discounts" value="1"
                    @if (old('discounts')) checked @endif>
                <label for="discounts">Информация об эксклюзивных скидках на номера</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="special_offers" id="special_offers" value="1"
                    @if (old('special_offers')) checked @endif>
                <label for="special_offers">Уведомления о спец предложениях</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-inputl" name="bonus_earnings" id="bonus_earnings" value="1"
                    @if (old('bonus_earnings')) checked @endif>
                <label for="bonus_earnings">Уведомления о начисленных бонусах</label>
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" name="feedback_responses" id="feedback_responses"
                    value="1" @if (old('feedback_responses')) checked @endif>
                <label for="feedback_responses">Уведомления об ответе отелей на ваши отзывы</label>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
