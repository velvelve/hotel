<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;

class CheckRoomAvailabilityService
{
    public function isAvailable(Room $room, $checkInDate, $checkOutDate): bool
    {
        $bookings = Booking::where('room_id', $room->id)
            ->where('check_out_date', '>', $checkInDate)
            ->where('check_in_date', '<', $checkOutDate)
            ->get();

        return $bookings->isEmpty();
    }
}