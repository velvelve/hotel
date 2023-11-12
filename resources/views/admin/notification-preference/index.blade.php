@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список настроек уведомлений</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.notification-preferences.create') }}" class="btn btn-sm btn-primary">Добавить
                    настройку</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Данные пользователя</th>
                    <th scope="col">Уведомления о скидках</th>
                    <th scope="col">Уведомления о спецпредложениях</th>
                    <th scope="col">Уведомления о начисленных бонусах</th>
                    <th scope="col">Уведомления о ответах на отзывы</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($preferences as $preference)
                    <tr>
                        <td>{{ $preference->id }}</td>
                        <td>
                            @if ($preference->user() === null)
                                <span>Пользователь не существует</span>
                            @else
                                <span>{{ $preference->user()->first_name }} {{ $preference->user()->last_name }}
                                    {{ $preference->user()->email }}</span>
                            @endif
                        </td>
                        <td>{{ $preference->discounts ? 'Включено' : 'Отключено' }}</td>
                        <td>{{ $preference->special_offers ? 'Включено' : 'Отключено' }}</td>
                        <td>{{ $preference->bonus_earnings ? 'Включено' : 'Отключено' }}</td>
                        <td>{{ $preference->feedback_responses ? 'Включено' : 'Отключено' }}</td>
                        <td>{{ $preference->created_at }}</td>
                        <td><a class="icon icon-edit"
                                href="{{ route('admin.notification-preferences.edit', ['notification_preference' => $preference]) }}"></a>
                            &nbsp;
                            <a class="icon icon-delete delete" href="javascript:;" rel="{{ $preference->id }}"></a>
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
                        send(`/admin/notification-preferences/${id}`).then(() => {
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
