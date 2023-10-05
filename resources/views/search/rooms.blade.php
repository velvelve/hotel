@extends('layouts.main')

@section('content')
    <x-rooms.search :guests=$guests />
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

            @foreach ($room->services as $service)
                <div>{{ $service->name }}</div>
                <div>{{ $service->description }}</div>
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
