<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Room;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    //возвращает view -> массив всех уникальных типов номеров с id(PK)
    public function index(): View
    {
        $rooms = Room::all(['id', 'room_type'])->unique('room_type');

        return view('rooms.types', ['rooms' => $rooms]);
    }
    //принимает тип номера и возвращает view->коллекцию номеров этого типа
    public function show($room_type): View
    {
        $rooms = Room::query()
            ->where('room_type', '=', $room_type)
            ->with(['includedServices', 'additionalServices'])
            ->get();
        return view('rooms.show', ['rooms' => $rooms]);
    }
}
