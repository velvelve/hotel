<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cities\Create;
use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use Exception;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.cities.index', [
            'cities' => City::all(),
        ]);
    }

    public function create()
    {
        return view('admin.cities.create', [
            'countries' => Country::all()
        ]);
    }

    public function store(Create $request)
    {
        $city = new City($request->validated());
        if ($city->save()) {
            return redirect()->route('admin.cities.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(City $city)
    {
        $location = Location::where('city_id', $city->id)->first();
        if ($location !== null) {
            redirect()->route('admin.cities.index')->with('error', __('We can not delete city, it has location bounded'));
            return response()->json('ok');
        }
        try {
            $city->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
