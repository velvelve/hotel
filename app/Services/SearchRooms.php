<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Image;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchRooms
{
    //получаем массив зарезервированных комнат, чтобы исключить их
    static function reservedRooms(Request $request): Collection|array
    {
        $dateRange = $request->input('date_range');
        $dateParts = explode(' - ', $dateRange);
        $checkInDate = $dateParts[0];
        $checkOutDate = $dateParts[1];
        $reservedRoomsId = [];

        $roomsFreeDate = Booking::query()
            ->where('check_in_date', '>=', $checkOutDate)
            ->orWhere('check_out_date', '>=', $checkInDate)
            ->get('room_id');

        foreach ($roomsFreeDate as $room) {
            $reservedRoomsId[] = $room->room_id;
        }
        //по просьбе Дмитрия
        $request->session()->put('check_in_date', $checkInDate);
        $request->session()->put('check_out_date', $checkOutDate);
        //
        return $reservedRoomsId;
    }

//получаем массив свободных комнат, на заданный период + фильтр по максимальному колличеству гостей
        static function freeRooms(Request $request,$reservedRoomsId): Collection|array
        {
            $guestCount = $request->input('guest_count');
            return Room::query()
                ->where('max_guest_count', '>=', $guestCount)
                ->whereNotIn('id', $reservedRoomsId)
                ->get();
        }

//получаем массив изображений для отфильтрованных комнат
        static function roomsImage($freeRooms): Collection|array
        {
            $freeRoomsId=[];
            foreach ($freeRooms as $room){
                $freeRoomsId[]=$room->id;
            }

            return Image::query()
                ->whereIn('room_id', $freeRoomsId)
                ->get();
        }

    //получаем массив сервисов для отфильтрованных комнат
    static function roomsServices($freeRooms): Collection|array
    {
        $freeRoomsId=[];
        foreach ($freeRooms as $room){
            $freeRoomsId[]=$room->id;
        }

        return Service::query()
            ->whereIn('room_id', $freeRoomsId)
            ->get();
    }
}
