@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование сервиса</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.services.update', ['service' => $service]) }}" id="store_form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}">
            </div>
            <div class="form-group">
                <label for="name">Описание</label>
                <input type="text" class="form-control" name="full_description" id="full_description"
                    value="{{ $service->full_description }}">
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $service->price }}">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
