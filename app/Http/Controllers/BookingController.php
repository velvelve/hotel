<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bookings\Create;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookingController extends Controller
{
    // Отображение списка всех бронирований(например для admin панели)
    public function index(): View
    {
        $bookings = Booking::all();
        return view('bookings.index', [
            'bookings' => $bookings,
        ]);
    }

    // Отображение формы для создания нового бронирования
    public function create($room_id): View
    {
        //Получаю из сессии данные о датах
        $check_in_date = session('check_in_date');
        $check_out_date = session('check_out_date');
        $guest_count = session('guest_count');

        //Получаю из url room_id
        $room = Room::findOrFail($room_id);

        //Получаю авторизированого user
        $user = Auth::user();
        
        return view('bookings.create', [
            'check_in_date' => $check_in_date,
            'check_out_date' => $check_out_date,
            'guest_count' => $guest_count,
            'room' => $room,
            'user' => $user,
        ]);
    }

    // Сохранение нового бронирования
    public function store(Create $request)
    {
        // Валидация запроса
        $validatedData = $request->validated();

        // Создаем новый объект бронирования
        $booking = new Booking($validatedData);
        $booking->status = \App\Enums\Booking\Status::BOOKED->value;
        
        // Сохраняем бронирование в базе данных
        $booking->save();
        
        // После сохранения перенаправит пользователя на другую страницу
        return redirect()->route('home')->with('success', 'Бронирование успешно создано!');
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
    public function update(Request $request, Booking $booking)
    {
        // Логика для обновления бронирования
    }

    // Удаление бронирования
    public function destroy(Booking $booking)
    {
        // Логика для удаления бронирования
    }
}
