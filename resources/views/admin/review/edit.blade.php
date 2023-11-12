@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование отзыва</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.reviews.update', ['review' => $review]) }}" id="store_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Пользователь</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id === $review->user_id) selected @endif>
                            {{ $user->first_name }} {{ $user->last_name }} {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="hotel_id">Отель</label>
                <select class="form-control" name="hotel_id" id="hotel_id">
                    @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}" @if ($hotel->id === $review->hotel_id) selected @endif>
                            {{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Текст коммeнтария</label>
                <textarea class="form-control" name="comment" id="comment">{{ $review->comment }}</textarea>
            </div>
            <div class="form-group">
                <label for="rating">Рейтинг</label>
                <input type="numeric" min="1" max="5" class="form-control" name="rating" id="rating"
                    value="{{ $review->rating }}">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
