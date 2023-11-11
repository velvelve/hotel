<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hotels\Create;
use App\Http\Requests\Admin\Hotels\Edit;
use App\Models\Hotel;
use App\Models\Location;
use Exception;
use Illuminate\Support\Facades\Log;

class HotelController extends Controller
{
    public function index()
    {
        return view('admin.hotel.index', [
            'hotels' => Hotel::all(),
        ]);
    }

    public function create()
    {
        return view('admin.hotel.create', [
            'locations' => Location::all(),
        ]);
    }

    public function store(Create $request)
    {
        $validated = $request->validated();
        $hotel = new Hotel($validated);
        if ($hotel->save()) {
            return redirect()->route('admin.hotels.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotel.edit', [
            'hotel' => $hotel,
            'locations' => Location::all(),
        ]);
    }

    public function update(Edit $request, Hotel $hotel)
    {
        $validated = $request->validated();
        $hotel = $hotel->fill($validated);
        if ($hotel->save()) {
            return redirect()->route('admin.hotels.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
