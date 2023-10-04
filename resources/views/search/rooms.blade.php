@extends('layouts.main')

@section('content')
    <form action="{{ route('search.rooms') }}" method="POST">
        @csrf
        <label for="date_range">Дата:</label>
        <input type="text" name="date_range" id="date_range" required>
        <label for="guest_count">Количество гостей:</label>
        <input type="number" name="guest_count" id="guest_count" value="{{ $guest_count }}" required>
        <button type="submit">Искать</button>
        <br>
    </form>
    <div>
        @foreach ($roomsList as $room)
            <h2>{{ $room->number }}</h2>

            @foreach ($room->images as $image)
                <img src="{{ $image->path }}" alt="{{ $image->filename }}">
            @endforeach

            {{-- для наглядности --}}
            <div>ID:{{ $room->id }}</div>
            {{-- для наглядности --}}

            <div>Цена: {{ $room->price }}</div>
            <div>Максимальная вместительность: {{ $room->max_guest_count }}</div>

            <div>Сервисы:</div>
            @foreach ($services as $service)
                @if ($room->id === $service->room_id)
                    <div>{{ $service->name }}</div>
                    <div>{{ $service->description }}</div @endif
                @endforeach

                <form action="#" method="POST">
                    <button>Выбрать</button>
                </form>
            @endforeach
    </div>
    <script>
        $(function() {
            $('input[name="date_range"]').daterangepicker({
                autoApply: true,
                opens: 'left',
                minDate: new Date(),
            })
        });
    </script>
@endsection
