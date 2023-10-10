@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/rooms/types.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="room_main_container">
        <div class="room_wrapper">
            <div class="room_title">Выберите необходимую категорию</div>
            <section class="room_content">
                @foreach($rooms as $room)
                    @if($room->room_type != 'Family')
                        <div class="room_cart">
                            <img class="room_cart_image" src="{{ asset($room->images[0]->path) }}"
                                 alt="{{ $room->images[0]->filename }}">
                            <a href="{{route('rooms.show', ['room_type' => $room->room_type])}}" class="room_cart_title">{{$room->room_type}}</a>
                        </div>
                    @else
            </section>
            <section class="room_content_family">
                    <div class="room_cart_family">
                        <img class="room_cart_image_family" src="{{ asset($room->images[0]->path) }}"
                             alt="{{ $room->images[0]->filename }}">
                        <a href="{{route('rooms.show', ['room_type' => $room->room_type])}}" class="room_cart_title_family">{{$room->room_type}}</a>
                    </div>
                    @endif
                @endforeach
            </section>
        </div>
    </div>
@endsection
