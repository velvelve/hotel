<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypesRooms\EditTypesRoomsRequest;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TypeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.types-rooms.index', [
            'arrayTypesRooms' => RoomType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(RoomType $typeRoom)
    {
        return view('admin.types-rooms.edit', [
            'typeRoom' => $typeRoom,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditTypesRoomsRequest $request, RoomType $typeRoom)
    {
        $typeRoom->fill($request->validated());

        if($typeRoom->save()) {
            return redirect()->route('admin.types-rooms.index')->with('success', 'Запись была успешно сохранена');
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
