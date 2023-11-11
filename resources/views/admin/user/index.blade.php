@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Добавить
                    пользователя</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('includes.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Email</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Город</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">Пол</th>
                    <th scope="col">Дата подтверждения Email</th>
                    <th scope="col">Подписки на уведомления</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->country ?? 'Неизвестно' }}</td>
                        <td>{{ $user->city ?? 'Неизвестно' }}</td>
                        <td>{{ $user->date_of_birth ?? 'Неизвестно' }}</td>
                        <td>{{ $user->gender ?? 'Неизвестно' }}</td>
                        <td>{{ $user->email_verified_at ?? 'Не подтверждён' }}</td>
                        <td>
                            @if ($user->notificationPreference)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled
                                        @if ($user->notificationPreference->discounts) checked @endif>
                                    <label>скидки</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled
                                        @if ($user->notificationPreference->special_offers) checked @endif>
                                    <label>спецпредложения</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled
                                        @if ($user->notificationPreference->bonus_earnings) checked @endif>
                                    <label>бонусы</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" disabled
                                        @if ($user->notificationPreference->feedback_responses) checked @endif>
                                    <label>ответы на отзывы</label>
                                </div>
                            @endif
                        </td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a class="icon icon-edit" href="{{ route('admin.users.edit', ['user' => $user]) }}"></a>
                            &nbsp;
                            <a class="icon icon-delete delete" href="javascript:;" rel="{{ $user->id }}"></a>
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
                        send(`/admin/users/${id}`).then(() => {
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
