<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BedTypes\Create;
use App\Http\Requests\Admin\BedTypes\Edit;
use App\Models\BedType;
use App\Models\Room;
use Exception;
use Illuminate\Support\Facades\Log;

class BedTypeController extends Controller
{
    public function index()
    {
        return view('admin.bed-type.index', [
            'bedTypes' => BedType::all(),
        ]);
    }

    public function create()
    {
        return view('admin.bed-type.create');
    }

    public function store(Create $request)
    {
        $bedType = new BedType($request->validated());
        if ($bedType->save()) {
            return redirect()->route('admin.bed-type.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(BedType $bedType)
    {
        return view('admin.bed-type.edit', [
            'bedType' => $bedType,
        ]);
    }

    public function update(Edit $request, BedType $bedType)
    {
        $validated = $request->validated();

        $bedType = $bedType->fill($validated);
        if ($bedType->save()) {
            return redirect()->route('admin.bed-type.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(BedType $bedType)
    {
        $room = Room::where('bed_type_id', $bedType->id)->first();
        if ($room !== null) {
            redirect()->route('admin.bed-type.index')->with('error', __('We can not delete this item, it has room bounded'));
            return response()->json('ok');
        }
        try {
            $bedType->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
