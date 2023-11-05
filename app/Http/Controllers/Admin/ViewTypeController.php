<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ViewTypes\Create;
use App\Http\Requests\Admin\ViewTypes\Edit;
use App\Models\Room;
use App\Models\ViewType;
use Exception;
use Illuminate\Support\Facades\Log;

class ViewTypeController extends Controller
{
    public function index()
    {
        return view('admin.view-type.index', [
            'viewTypes' => ViewType::all(),
        ]);
    }

    public function create()
    {
        return view('admin.view-type.create');
    }

    public function store(Create $request)
    {
        $viewType = new ViewType($request->validated());
        if ($viewType->save()) {
            return redirect()->route('admin.view-type.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(ViewType $viewType)
    {
        return view('admin.view-type.edit', [
            'viewType' => $viewType,
        ]);
    }

    public function update(Edit $request, ViewType $viewType)
    {
        $validated = $request->validated();

        $viewType = $viewType->fill($validated);
        if ($viewType->save()) {
            return redirect()->route('admin.view-type.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(ViewType $viewType)
    {
        $room = Room::where('view_type_id', $viewType->id)->first();
        if ($room !== null) {
            redirect()->route('admin.view-type.index')->with('error', __('We can not delete this item, it has room bounded'));
            return response()->json('ok');
        }
        try {
            $viewType->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
