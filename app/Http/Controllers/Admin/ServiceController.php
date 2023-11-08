<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Services\Create;
use App\Http\Requests\Admin\Services\Edit;
use App\Models\Hotel;
use App\Models\HotelService;
use App\Models\Image;
use App\Models\ImageService;
use App\Models\Room;
use App\Models\RoomService;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index()
    {
        return view('admin.service.index', [
            'services' => Service::all(),
        ]);
    }

    public function create()
    {
        $images = Image::whereNull('room_id')
            ->whereNull('hotel_id')
            ->where('path', 'like', '%img/services%')
            ->get();
        $imagesWithoutIcons = [];
        foreach ($images as $image) {
            $imageService = ImageService::where('image_id', $image->id)->first();
            if ($imageService && !$imageService->is_icon) {
                $imagesWithoutIcons[] = $image;
            }
        }
        return view('admin.service.create', [
            'images' => $imagesWithoutIcons
        ]);
    }

    public function store(Create $request)
    {
        $iconId = $request->input('icon');
        $serviceImageIds = $request->input('selected_image_ids');
        $service = new Service($request->validated());
        if ($service->save()) {
            ImageService::create([
                'service_id' => $service->id,
                'image_id' => $iconId,
                'is_icon' => true,

            ]);
            if ($serviceImageIds !== null) {
                foreach ($serviceImageIds as $imageId) {
                    ImageService::create([
                        'service_id' => $service->id,
                        'image_id' => $imageId,
                        'is_icon' => false,

                    ]);
                }
            }
            return redirect()->route('admin.services.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', [
            'service' => $service,
        ]);
    }

    public function update(Edit $request, Service $service)
    {
        $validated = $request->validated();

        $service = $service->fill($validated);
        if ($service->save()) {
            return redirect()->route('admin.services.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Service $service)
    {
        if ($service->bookings !== null) {
            $canNotDelete = false;
            foreach ($service->bookings as $booking) {
                $checkInDate = Carbon::parse($booking->check_in_date);
                $checkOutDate = Carbon::parse($booking->check_out_date);
                if ($checkInDate->isToday() || $checkInDate->isFuture() || $checkOutDate->isFuture()) {
                    $canNotDelete = true;
                    break;
                }
            }
            if ($canNotDelete) {
                redirect()->route('admin.services.index')->with('error', __('We can not delete this item, it has booking bounded'));
                return response()->json('ok');
            }
        }
        $imageServices = ImageService::query()
            ->where('service_id', $service->id)
            ->with('image')
            ->get();
        try {
            foreach ($imageServices as $imageService) {
                $image = $imageService->image;
                if (sizeof(ImageService::where('image_id', $image->id)->get()) === 1) {
                    $image->delete();
                    Storage::delete($image->path);
                }
            }
            $service->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
