<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    //возвращает view -> массив всех уникальных типов номеров с id(PK)
    public function index(): View
    {
        $rooms = Room::all(['id', 'room_type','max_guest_count','price'])->unique('room_type');
        return view('rooms.types', ['rooms' => $rooms, 'guests' => 1]);
    }

}
