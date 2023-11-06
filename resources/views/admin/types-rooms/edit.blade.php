@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование категории</h1>
    </div>

    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.types-rooms.update', ['typeRoom' => $typeRoom]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <!--Пока что name менять нельзя иначе ломается поиск.-->
                <label for="name">Название</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $typeRoom->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <input type="text" class="form-control" name="description" id="description" value=" {{ $typeRoom->description }} ">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
