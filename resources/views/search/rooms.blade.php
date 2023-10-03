
<div>
    @foreach($roomsList as $room)
        <h2>{{$room['name']}}</h2>
        <img src="{{$room['image']}}" alt="image">
        <div>{{$room['description']}}</div>
        <div>Цена:{{$room['price']}}</div>
        <button><a href="#">Забронировать</a></button>
    @endforeach
<div>
