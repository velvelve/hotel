@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список отзывов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.phones.create') }}" class="btn btn-sm btn-primary">Добавить
                    телефон</a>
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
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Тип номера (отдел отеля)</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($phones as $phone)
                    <tr>
                        <td>{{ $phone->id }}</td>
                        <td>{{ $phone->hotel->name }}</td>
                        <td>{{ $phone->number }}</td>
                        <td>{{ $phone->type }}</td>
                        <td>{{ $phone->created_at }}</td>
                        <td><a class="icon icon-edit" href="{{ route('admin.phones.edit', ['phone' => $phone]) }}"></a>
                            &nbsp;
                            <a class="icon icon-delete delete" href="javascript:;" rel="{{ $phone->id }}"></a>
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
                        send(`/admin/phones/${id}`).then(() => {
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
