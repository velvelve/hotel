<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,): view
    {


        $dateRange = $request->input('date_range');
        $dateParts = explode(' - ', $dateRange);
        $checkInDate = $dateParts[0];
        $checkOutDate = $dateParts[1];
        $guestCount = $request->input('guest_count');
        //временный статичный массив, пока отсутствует БД
        $freeRooms = Room::query()->where('max_guest_count', '>=', $guestCount)->get();
        return view('search.rooms', ['roomsList' => $freeRooms]);
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
