<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\Create;
use App\Http\Requests\Booking\Edit;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Отображение списка всех бронирований(например для admin панели)
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    // Отображение формы для создания нового бронирования
    public function create()
    {
        return view('bookings.create');
    }

    // Сохранение нового бронирования
    public function store(Create $request)
    {
        // Логика для сохранения бронирования
    }

    // Отображение информации о конкретном бронировании
    public function show(Booking $booking)
    {
        // Логика для отображение информации о конкретном бронировании
    }

    // Отображение формы для редактирования бронирования
    public function edit(Booking $booking)
    {
        // Логика для отображение формы для редактирования бронирования
    }

    // Обновление информации о бронировании
    public function update(Edit $request, Booking $booking)
    {
        // Логика для обновления бронирования
    }

    // Удаление бронирования
    public function destroy(Booking $booking)
    {
        // Логика для удаления бронирования
    }
}
