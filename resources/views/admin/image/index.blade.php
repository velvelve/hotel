@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список изображений</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.images.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    изображение</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Отель</th>
                    <th scope="col">Номер</th>
                    <th scope="col">Имя файла</th>
                    <th scope="col">Путь к файлу</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>{{ optional($image->hotel)->name ?: 'Нет связи' }}</td>
                        <td>{{ optional($image->room)->room_number ?: 'Нет связи' }}</td>
                        <td>{{ $image->filename }}</td>
                        <td>{{ $image->path }}</td>
                        <td>{{ $image->created_at }}</td>
                        <td><a href="{{ route('admin.images.edit', ['image' => $image]) }}">Edit</a> &nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $image->id }}">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Записей не найдено</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let elements = document.querySelectorAll(".delete")
            elements.forEach(function(element, key) {
                element.addEventListener('click', function() {
                    const id = this.getAttribute('rel');
                    if (confirm(`Вы подтверждаете удаление записи с ID ${id}?`)) {
                        send(`/admin/images/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert("Вы отменили удаление записи")
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
