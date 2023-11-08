<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rooms\Create;
use App\Http\Requests\Admin\Rooms\Edit;
use App\Models\BedType;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\ViewType;
use Exception;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index', [
            'rooms' => Room::all(),
        ]);
    }

    public function create()
    {
        return view('admin.room.create', [
            'hotels' => Hotel::all(),
            'room_types' => RoomType::all(),
            'view_types' => ViewType::all(),
            'bed_types' => BedType::all(),
        ]);
    }

    public function store(Create $request)
    {
        $room = new Room($request->validated());
        if ($room->save()) {
            return redirect()->route('admin.rooms.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Room $room)
    {
        return view('admin.room.edit', [
            'room' => $room,
        ]);
    }

    public function update(Edit $request, Room $room)
    {
        $validated = $request->validated();

        $room = $room->fill($validated);
        if ($room->save()) {
            return redirect()->route('admin.services.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Room $room)
    {
        try {
            $room->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }

    public function room_numbers(Hotel $hotel)
    {
        $roomNumbers = $hotel->rooms->pluck('room_number')->toArray();

        return response()->json($roomNumbers);
    }
}
