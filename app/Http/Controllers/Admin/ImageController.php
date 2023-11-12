<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Images\Create;
use App\Http\Requests\Admin\Images\Edit;
use App\Models\Hotel;
use App\Models\Image;
use App\Models\ImageService;
use App\Models\Room;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index()
    {
        return view('admin.image.index', [
            'images' => Image::all(),
        ]);
    }

    public function create()
    {
        $subfolders = $this->getImgSubfolders();
        return view('admin.image.create', [
            'hotels' => Hotel::all(),
            'rooms' => Room::all(),
            'subfolders' => $subfolders,
        ]);
    }

    public function store(Create $request)
    {
        $validated = $request->validated();
        $hotel_id = $validated['hotel_id'];
        $room_id = $validated['room_id'];
        $imageFile = $validated['image'];
        $filename = $validated['filename'];
        $destination_folder = $validated['destination_folder'];
        $directory = 'img';
        if ($hotel_id === null && $room_id === null && $destination_folder !== null) {
            $directory = $destination_folder;
        } else {
            if ($hotel_id !== null) {
                $hotelsFolderPath = '/img/hotels';
                if (!Storage::exists($hotelsFolderPath)) {
                    Storage::makeDirectory($hotelsFolderPath);
                }
                $directory = $hotelsFolderPath;
            } else {
                if ($room_id !== null) {
                    $room = Room::find($room_id);
                    $roomTypeSubfolderName = strtolower($room->roomType->constant);
                    $fullRoomFolderPath = '/img/rooms/' . $roomTypeSubfolderName;
                    if (!Storage::exists($fullRoomFolderPath)) {
                        Storage::makeDirectory($fullRoomFolderPath);
                    }
                    $directory = $fullRoomFolderPath;
                } else {
                    return back()->with('error', __('We can not save item, please try again'));
                }
            }
        }
        $filenameWithExtension = pathinfo($filename, PATHINFO_FILENAME) . '.' . $imageFile->getClientOriginalExtension();
        $path = '/' . $imageFile->storeAs($directory, $filenameWithExtension);
        $image = new Image([
            'hotel_id' => $hotel_id,
            'room_id' => $room_id,
            'filename' => $filename,
            'path' => $path,
        ]);
        if ($image->save()) {
            return redirect()->route('admin.images.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Image $image)
    {
        $subfolders = $this->getImgSubfolders();
        return view('admin.image.edit', [
            'image' => $image,
            'hotels' => Hotel::all(),
            'rooms' => Room::all(),
            'subfolders' => $subfolders,
        ]);
    }

    public function update(Edit $request, Image $image)
    {
        $validated = $request->validated();
        $hotel_id = $validated['hotel_id'];
        $room_id = $validated['room_id'];
        $imageFile = $validated['image'];
        $filename = $validated['filename'];
        $destination_folder = $validated['destination_folder'];
        $directory = 'img';
        if ($hotel_id === null && $room_id === null && $destination_folder !== null) {
            $directory = $destination_folder;
        } else {
            if ($hotel_id !== null) {
                $hotelsFolderPath = '/img/hotels';
                if (!Storage::exists($hotelsFolderPath)) {
                    Storage::makeDirectory($hotelsFolderPath);
                }
                $directory = $hotelsFolderPath;
            } else {
                if ($room_id !== null) {
                    $room = Room::find($room_id);
                    $roomTypeSubfolderName = strtolower($room->roomType->constant);
                    $fullRoomFolderPath = '/img/rooms/' . $roomTypeSubfolderName;
                    if (!Storage::exists($fullRoomFolderPath)) {
                        Storage::makeDirectory($fullRoomFolderPath);
                    }
                    $directory = $fullRoomFolderPath;
                } else {
                    return back()->with('error', __('We can not save item, please try again'));
                }
            }
        }
        if ($imageFile !== null) {
            $filenameWithExtension = pathinfo($filename, PATHINFO_FILENAME) . '.' . $imageFile->getClientOriginalExtension();
            $path = '/' . $imageFile->storeAs($directory, $filenameWithExtension);
            Storage::delete($image->path);
        }
        $image->fill([
            'hotel_id' => $hotel_id,
            'room_id' => $room_id,
            'filename' => $filename,
            'path' => $path,
        ]);
        if ($image->save()) {
            return redirect()->route('admin.images.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Image $image)
    {
        $iconImageService = ImageService::where('is_icon', true)
            ->where('image_id', $image->id)
            ->get();
        if ($iconImageService !== null && sizeof($iconImageService) === 1) {
            redirect()->route('admin.images.index')->with('error', __('We can not delete this item, it is service icon, you need to delete service first'));
            return response()->json('ok');
        }
        try {
            $image->delete();
            Storage::delete($image->path);
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }

    private function getImgSubfolders()
    {
        $subfolders = Storage::allDirectories('img');
        $hotelsSubfolder = 'img/hotels/';
        $hotelsExcluded = array_filter($subfolders, function ($str) use ($hotelsSubfolder) {
            return strpos($str, $hotelsSubfolder) === false;
        });
        $roomsSubfolder = 'img/rooms/';
        $roomsExcluded = array_filter($hotelsExcluded, function ($str) use ($roomsSubfolder) {
            return strpos($str, $roomsSubfolder) === false;
        });
        $correctPathFolders = [];
        foreach ($roomsExcluded as $subfolder) {
            $correctPathFolders[] = '/' . $subfolder;
        }
        return  $correctPathFolders;
    }
}
