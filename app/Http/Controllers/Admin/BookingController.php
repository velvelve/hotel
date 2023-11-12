<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bookings\Create;
use App\Http\Requests\Admin\Bookings\Edit;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Services\SearchRooms;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.index', [
            'bookings' => Booking::all(),
        ]);
    }

    public function create()
    {
        $user = User::find(Auth::user()->id);
        if (!$user->isAdmin()) {
            abort(401);
        }
        return view('admin.booking.create', [
            'rooms' => Room::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Create $request)
    {
        $validated = $request->validated();
        $checkInDate = $validated['check_in_date'];
        $checkOutDate = $validated['check_out_date'];
        $guestCount = $validated['guests_count'];
        $roomId = $validated['room_id'];
        $answer = SearchRooms::checkRoom(
            $checkInDate,
            $checkOutDate,
            $guestCount,
            $roomId
        );
        if ($answer === '') {
            $booking = new Booking($request->validated());
            if ($booking->save()) {
                return redirect()->route('admin.bookings.index')->with('success', __('Record was saved successfully'));
            }
            return back()->with('error', __('We can not save item, please try again'));
        } else {
            return redirect()->route('admin.bookings.index')->with('error', $answer);
        }
    }

    public function edit(Booking $booking)
    {
        return view('admin.booking.edit', [
            'booking' => $booking,
        ]);
    }

    public function update(Edit $request, Booking $booking)
    {
        $validated = $request->validated();
        $checkInDate = $validated['check_in_date'];
        $checkOutDate = $validated['check_out_date'];
        $canSave = true;
        if ($booking->check_in_date !== $checkInDate || $booking->check_out_date !== $checkOutDate) {
            $existingBookings = Booking::where('room_id', $booking->room_id)
                ->where('id', '!=', $booking->id)
                ->get();
            foreach ($existingBookings as $existing) {
                if (
                    ($checkInDate >= $existing->check_in_date && $checkInDate < $existing->check_out_date) ||
                    ($checkOutDate > $existing->check_in_date && $checkOutDate <= $existing->check_out_date) ||
                    ($checkInDate <= $existing->check_in_date && $checkOutDate >= $existing->check_out_date)
                ) {
                    $canSave = false;
                    break;
                }
            }
        }

        if ($canSave) {
            $booking = $booking->fill($validated);
            if ($booking->save()) {
                return redirect()->route('admin.bookings.index')->with('success', __('Record was saved successfully'));
            }
            return back()->with('error', __('We can not save item, please try again'));
        } else {
            return redirect()->route('admin.bookings.index')->with('error', 'We can not save item, its dates overlap other bookings');
        }
    }

    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
