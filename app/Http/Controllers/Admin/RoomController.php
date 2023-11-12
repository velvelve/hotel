<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rooms\Create;
use App\Http\Requests\Admin\Rooms\Edit;
use App\Models\BedType;
use App\Models\Hotel;
use App\Models\Image;
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
        $images = Image::where('path', 'like', '%img/rooms%')
            ->distinct('path')
            ->get();
        return view('admin.room.create', [
            'hotels' => Hotel::all(),
            'images' => $images,
            'room_types' => RoomType::all(),
            'view_types' => ViewType::all(),
            'bed_types' => BedType::all(),
        ]);
    }

    public function store(Create $request)
    {

        $room = new Room($request->validated());
        if ($room->save()) {
            $imagePaths = $request->input('selected_image_paths');
            if ($imagePaths !== null) {
                foreach ($imagePaths as $imagePath) {
                    $filename = substr($imagePath, strrpos($imagePath, '/') + 1);
                    Image::create([
                        'hotel_id' => null,
                        'room_id' => $room->id,
                        'filename' => $filename,
                        'path' => $imagePath,
                    ]);
                }
            }
            return redirect()->route('admin.rooms.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Room $room)
    {
        $images = Image::where('path', 'like', '%img/rooms%')
            ->distinct('path')
            ->get();

        $currentRoomNumber = $room->room_number;
        $forbiddenRoomNumbers = $room
            ->hotel
            ->rooms
            ->pluck('room_number')
            ->reject(function ($roomNumber) use ($currentRoomNumber) {
                return $roomNumber === $currentRoomNumber;
            })->toArray();
        return view('admin.room.edit', [
            'images' => $images,
            'room' => $room,
            'forbidden_numbers' => json_encode($forbiddenRoomNumbers),
            'room_types' => RoomType::all(),
            'view_types' => ViewType::all(),
            'bed_types' => BedType::all(),
        ]);
    }

    public function update(Edit $request, Room $room)
    {
        $validated = $request->validated();

        $room = $room->fill($validated);
        $room->availability = $request->has('availability');
        if ($room->save()) {
            $imagePaths = $request->input('selected_image_paths');
            if ($imagePaths !== null) {
                $imagesToSave = [];
                $imagesToRemove = [];
                $roomImages = $room->images;
                foreach ($roomImages as $roomImage) {
                    if (in_array($roomImage->path, $imagePaths)) {
                        $imagesToRemove[] = $roomImage->path;
                    } else {
                        $roomImage->delete();
                    }
                }
                foreach ($imagePaths as $imagePath) {
                    if (array_search($imagePath, $imagesToRemove) === false) {
                        $imagesToSave[] = $imagePath;
                    }
                }

                foreach ($imagesToSave as $imageToSave) {
                    $filename = substr($imageToSave, strrpos($imageToSave, '/') + 1);
                    Image::create([
                        'hotel_id' => null,
                        'room_id' => $room->id,
                        'filename' => $filename,
                        'path' => $imageToSave,
                    ]);
                }
            }
            return redirect()->route('admin.rooms.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Room $room)
    {
        try {
            $images = $room->images;
            foreach ($images as $image) {
                $image->delete();
            }
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
