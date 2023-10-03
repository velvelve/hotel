<div>
    @foreach($roomsList as $room)
    <h2>{{ $room->number }}</h2>
    <img src="{{ url($room->image()->path) }}" alt="{{ $room->image()->filename }}">
    <div>Цена: {{ $room->price }}</div>
    <div>Максимальная вместительность: {{ $room->max_guest_count }}</div>
    <button><a href="#">Забронировать</a></button>
    @endforeach
    <div>