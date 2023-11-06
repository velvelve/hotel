@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список бронирований</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.bookings.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                        бронирование</a>
                @endif
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Номер комнаты</th>
                    <th scope="col">Email пользователя</th>
                    <th scope="col">Дата заезда</th>
                    <th scope="col">Дата выезда</th>
                    <th scope="col">ФИО клиента</th>
                    <th scope="col">Телефон клиента</th>
                    <th scope="col">Email клиента</th>
                    <th scope="col">Промо код</th>
                    <th scope="col">Пожелания клиента</th>
                    <th scope="col">Количество гостей</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->room()->room_number }} </td>
                        <td>{{ $booking->user()->email }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->client_first_name }} {{ $booking->client_middle_name }}
                            {{ $booking->client_last_name }}</td>
                        <td>{{ $booking->client_phone }}</td>
                        <td>{{ $booking->client_email }}</td>
                        <td>{{ $booking->promo_code }}</td>
                        <td>{{ $booking->client_wishes }}</td>
                        <td>{{ $booking->guests_count }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->total_price }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td><a href="{{ route('admin.bookings.edit', ['booking' => $booking]) }}">Edit</a>
                            &nbsp;
                            <a href="javascript:;" class="delete" rel="{{ $booking->id }}">Delete</a>
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
                        send(`/admin/bookings/${id}`).then(() => {
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
