@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий номеров</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">Добавить новую категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Название</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Создан</th>
                    <th scope="col">Изменен</th>
                    <th scope="col">Действие</th>
                </tr>
            </thead>
            <tbody>
                @forelse($arrayTypesRooms as $typeRoom)
                    <tr>
                        <td> {{ $typeRoom->id }}</td>
                        <td> {{ $typeRoom->name }}</td>
                        <td> {{ $typeRoom->description }}</td>
                        <td> {{ $typeRoom->created_at }}</td>
                        <td> {{ $typeRoom->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.types-rooms.edit', ['typeRoom' => $typeRoom]) }}">Редактировать</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Ничего не найдено</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
