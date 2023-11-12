<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Countries\Create;
use App\Models\Country;
use App\Models\Location;
use Exception;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.countries.index', [
            'countries' => Country::all(),
        ]);
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Create $request)
    {
        $country = new Country($request->validated());
        if ($country->save()) {
            return redirect()->route('admin.countries.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Country $country)
    {
        $location = Location::where('country_id', $country->id)->first();
        if ($location !== null) {
            redirect()->route('admin.countries.index')->with('error', __('We can not delete country, it has location bounded'));
            return response()->json('ok');
        }
        try {
            $country->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
