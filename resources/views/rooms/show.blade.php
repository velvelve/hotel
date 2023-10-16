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
                @foreach ($room->additionalServices as $service)
                    @dd($service->icon())
                    <img src="{{ $service->icon[0]->path }}" alt="{{ $service->icon[0]->filename }}" />
                    <div>{{ $service->name }}</div>
                    <div>Цена: {{ $service->price }}$</div>
                @endforeach
                <h2>Включены в стоимость:</h2>
                @foreach ($room->includedServices as $service)
                    <img src="{{ $service->icon[0]->path }}" alt="{{ $service->icon[0]->filename }}" />
                    <div>{{ $service->name }}</div>
                @endforeach
            </div>
        @endforeach
    </section>
@endsection
