<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomTypes\EditRoomTypesRequest;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.room-types.index', [
            'arrayRoomTypes' => RoomType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.room-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'description');
        $data['constant'] = strtoupper($data['name']);

        $roomType = new RoomType($data);

        if($roomType->save()) {
            return redirect()->route('admin.room-types.index')->with('success', 'Запись была успешно создана');
        }

        return back()->with('error', 'При создание произошла ошибка');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType): View
    {
        return view('admin.room-types.edit', [
            'roomType' => $roomType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRoomTypesRequest $request, RoomType $roomType)
    {
        $roomType->fill($request->validated());

        if($roomType->save()) {
            return redirect()->route('admin.room-types.index')->with('success', 'Запись была успешно сохранена');
        }

        return back()->with('error', 'При сохранение произошла ошибка');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
