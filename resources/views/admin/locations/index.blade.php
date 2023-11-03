@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список местоположений</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.locations.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    местоположение</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Город</th>
                    <th scope="col">Улица</th>
                    <th scope="col">Дом</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->country->name }}</td>
                        <td>{{ $location->city->name }}</td>
                        <td>{{ $location->street }}</td>
                        <td>{{ $location->house }}</td>
                        <td>{{ $location->created_at }}</td>
                        <td><a href="{{ route('admin.locations.edit', ['location' => $location]) }}">Edit</a> &nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $location->id }}">Delete</a>
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
                        send(`/admin/locations/${id}`).then(() => {
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
