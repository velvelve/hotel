<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Locations\Create;
use App\Http\Requests\Admin\Locations\Edit;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function index()
    {
        return view('admin.locations.index', [
            'locations' => Location::all(),
        ]);
    }

    public function create()
    {
        return view('admin.locations.create', [
            'countries' => Country::all()
        ]);
    }

    public function store(Create $request)
    {
        $location = new Location($request->validated());
        if ($location->save()) {
            return redirect()->route('admin.locations.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Location $location)
    {
        $countries = Country::all();
        return \view('admin.locations.edit', [
            'location' => $location,
            'countries' => $countries,
        ]);
    }

    public function update(Edit $request, Location $location)
    {
        $validated = $request->validated();

        $location = $location->fill($validated);
        if ($location->save()) {
            return redirect()->route('admin.locations.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Location $location)
    {
        $hotel = Hotel::where('location_id', $location->id)->first();
        if ($hotel !== null) {
            redirect()->route('admin.locations.index')->with('error', __('We can not delete location, it has hotel bounded'));
            return response()->json('ok');
        }
        try {
            $location->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }

    public function city(Request $request, $id)
    {
        if ($request->ajax()) {
            return response()->json([
                'cities' => City::where('country_id', $id)->get()
            ]);
        }
    }
}
