@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список номеров</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.rooms.create') }}" class="btn btn-sm btn-primary">Добавить
                    номер</a>
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
                    <th scope="col">Номер комнаты</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Площадь</th>
                    <th scope="col">Количество комнат</th>
                    <th scope="col">Количство взрослых</th>
                    <th scope="col">Количество детей</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Доступность</th>
                    <th scope="col">Тип комнаты</th>
                    <th scope="col">Тип вида из окна</th>
                    <th scope="col">Тип кроватей</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->hotel->name }} </td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->area }}</td>
                        <td>{{ $room->apartment_count }}</td>
                        <td>{{ $room->adults_max_guests }}</td>
                        <td>{{ $room->children_max_guests }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->availability ? 'Доступен' : 'Не доступен' }}</td>
                        <td>{{ $room->roomType->name }}</td>
                        <td>{{ $room->viewType->description }}</td>
                        <td>{{ $room->bedType->description }}</td>
                        <td>{{ $room->created_at }}</td>
                        <td><a class="icon icon-edit" href="{{ route('admin.rooms.edit', ['room' => $room]) }}"></a>
                            &nbsp;
                            <a class="icon icon-delete delete" href="javascript:;" rel="{{ $room->id }}"></a>
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
                        send(`/admin/rooms/${id}`).then(() => {
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
