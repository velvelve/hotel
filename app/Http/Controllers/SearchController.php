<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchRequest;
use App\Services\SearchRooms;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function searchRooms(SearchRequest $request): view
    {
        //получаем массив зарезервированных комнат, чтобы исключить их
        $availableRooms = SearchRooms::getAvailableRooms($request);
        //получаем массив свободных комнат, на заданный период + фильтр по максимальному колличеству гостей
        $freeRooms = SearchRooms::freeRooms($request, $availableRooms);
        //получаем массив комнат с фильтром по типу
        $roomsRightType = SearchRooms::roomsRightType($request, $freeRooms);

        //получаем массив изображений для отфильтрованных комнат
        //$images=SearchRooms::roomsImage($freeRooms);

        //получаем массив сервисов для отфильтрованных комнат
        //$services=SearchRooms::roomsServices($freeRooms);

        $typeRoom = $request->input('type-room');
        $guests = $request->input('guest_count');

        return view('search.rooms', [
            'roomsList' => $roomsRightType,
            'guests' => $guests,
            'typeRoom' => $typeRoom
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
