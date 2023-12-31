<?php

namespace App\Services;

use App\Models\Room;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SearchRooms
{
    //получаем массив зарезервированных комнат, чтобы исключить их
    static function getAvailableRooms(Request $request): Collection
    {
        $dateRange = $request->input('date_range');
        $dateParts = explode(' - ', $dateRange);
        $checkInDate = $dateParts[0];
        $checkOutDate = $dateParts[1];
        $guestCount = $request->input('guest_count');
        $availableRooms = Room::query()
            ->leftJoin('bookings', function ($join) use ($checkInDate, $checkOutDate) {
                $join->on('rooms.id', '=', 'bookings.room_id')
                    ->where(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->whereBetween('bookings.check_in_date', [$checkInDate, $checkOutDate])
                            ->orWhereBetween('bookings.check_out_date', [$checkInDate, $checkOutDate])
                            ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                                $query->where('bookings.check_in_date', '<=', $checkInDate)
                                    ->where('bookings.check_out_date', '>=', $checkOutDate);
                            });
                    });
            })
            ->whereNull('bookings.id')
            ->select('rooms.*')
            ->get();

        $request->session()->put('check_in_date', $checkInDate);
        $request->session()->put('check_out_date', $checkOutDate);
        $request->session()->put('guest_count', $guestCount);
        //
        return  $availableRooms->sortBy('price');
    }

    //получаем массив свободных комнат, на заданный период + фильтр по максимальному колличеству гостей
    static function freeRooms(Request $request, $availableRooms): Collection|array
    {
        $roomsThatFeetRequirements = [];
        $guestCount = $request->input('guest_count');

        foreach ($availableRooms as $availableRoom) {
            $totalCount = $availableRoom->adults_max_guests + $availableRoom->children_max_guests;
            if ($totalCount >= $guestCount) {
                $roomsThatFeetRequirements[] = $availableRoom;
            }
        }
        return $roomsThatFeetRequirements;
    }

    //получаем массив комнат с фильтром по типу
    static function roomsRightType(Request $request, $freeRooms): Collection|array
    {
        $roomsThatFeetRequirements = [];
        $typeRoom = $request->input('type-room');
        if ($typeRoom == 'Все') {
            return $freeRooms;
        }

        foreach ($freeRooms as $freeRoom) {
            if ($freeRoom->roomType->name == $typeRoom) {
                $roomsThatFeetRequirements[] = $freeRoom;
            }
        }
        return $roomsThatFeetRequirements;
    }

    static public function checkRoom(string $checkInDate, string $checkOutDate, int $guestCount, int $roomId)
    {
        $availableRooms = Room::query()
            ->leftJoin('bookings', function ($join) use ($checkInDate, $checkOutDate) {
                $join->on('rooms.id', '=', 'bookings.room_id')
                    ->where(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->whereBetween('bookings.check_in_date', [$checkInDate, $checkOutDate])
                            ->orWhereBetween('bookings.check_out_date', [$checkInDate, $checkOutDate])
                            ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                                $query->where('bookings.check_in_date', '<=', $checkInDate)
                                    ->where('bookings.check_out_date', '>=', $checkOutDate);
                            });
                    });
            })
            ->whereNull('bookings.id')
            ->select('rooms.*')
            ->get();
        $room = null;
        foreach ($availableRooms as $availableRoom) {
            if ($availableRoom->id === $roomId) {
                $room = $availableRoom;
                break;
            }
        }
        $roomById = Room::find($roomId);
        if ($room === null) {
            return 'Комната ' . $roomById->room_number . ' занята на указанные даты';
        } else {
            $totalCount = $room->adults_max_guests + $room->children_max_guests;
            if ($totalCount < $guestCount) {
                return 'Комната ' . $roomById->room_number . ' вмещает ' . $totalCount . ' гостей максимум';
            } else {
                return '';
            }
        }
    }
}
