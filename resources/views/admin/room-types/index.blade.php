@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий номеров</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.room-types.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новую
                    категорию</a>
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
                @forelse($arrayRoomTypes as $roomType)
                    <tr>
                        <td> {{ $roomType->id }}</td>
                        <td> {{ $roomType->name }}</td>
                        <td> {{ $roomType->description }}</td>
                        <td> {{ $roomType->created_at }}</td>
                        <td> {{ $roomType->updated_at }}</td>
                        <td>
                            <a class="btn btn-link"
                                href="{{ route('admin.room-types.edit', ['roomType' => $roomType]) }}">Редактировать</a> |
                            <form action="{{ route('admin.room-types.destroy', ['roomType' => $roomType]) }}" method="post"
                                class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </form>
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
