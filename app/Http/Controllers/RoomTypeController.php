<?php

namespace App\Http\Controllers;

use App\Models\RoomTypeModel;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    //возвращает view -> массив всех уникальных типов номеров с id(PK)
    public function index(): View
    {
        $rooms = RoomTypeModel::getRoomTypesArray();
        return view('rooms.types', ['rooms' => $rooms, 'guests' => 1, 'typeRoom' => 'Все']);
    }
}
