@extends('layouts.main')

@push('styles')
{{--файл стилей--}}
@endpush

@section('content')
    <section class="content">
        @foreach($rooms as $room)
            <div style="color: #79655E; padding: 20px">
            <h2>Номер {{$room->room_type}}</h2>
            @foreach($room->images as $image)
                <img style="max-width: 200px" src="{{$image->path}}" alt="{{$image->filename}}">
            @endforeach
                <h3>Сервисы:</h3>
            @foreach($room->services as $service)
                    <div>{{$service->name}}</div>
                    <div>{{$service->description}}</div>
            @endforeach
            </div>
        @endforeach
    </section>
@endsection
