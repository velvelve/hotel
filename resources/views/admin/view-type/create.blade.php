@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление типа вида из номера</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.view-types.store') }}" id="store_form">
            @csrf
            <div class="form-group">
                <label for="name">Описание</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="{{ old('description') }}">
            </div>
            <div class="form-group">
                <label for="name">Константа</label>
                <input type="text" class="form-control" name="constant" id="constant" value="{{ old('constant') }}">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
