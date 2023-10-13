@extends('layouts.main')

@push('styles')
    {{-- файл стилей --}}
@endpush

@section('content')
    <section class="content">
        @foreach ($rooms as $room)
            <div style="color: #79655E; padding: 20px">
                <h2>Номер {{ $room->room_type }}</h2>
                @foreach ($room->images as $image)
                    <img style="max-width: 200px" src="{{ $image->path }}" alt="{{ $image->filename }}">
                @endforeach
                <h3>Сервисы:</h3>
                <h2>Дополнительные:</h2>
                @foreach ($room->services as $service)
                    @if ($service->roomService->additional)
                        <img src="{{ $service->icon()->path }}" alt="{{ $service->icon()->filename }}" />
                        <div>{{ $service->short_description }}</div>
                        <div>{{ $service->full_description }}</div>
                    @endif
                @endforeach
                <h2>Включены в стоимость:</h2>
                @foreach ($room->services as $service)
                    @if (!$service->roomService->additional)
                        <img src="{{ $service->icon()->path }}" alt="{{ $service->icon()->filename }}" />
                        <div>{{ $service->short_description }}</div>
                        <div>{{ $service->full_description }}</div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </section>
@endsection
