<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

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
    public function create($room_id): View | RedirectResponse
    {
        //Проверка авторизации пользователя
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для бронирования необходимо авторизоваться');
        }

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
    public function save(Request $request)
    {
        $customerData = session('customer_data');
        $check_in_date = $customerData['check_in_date'];
        $check_out_date = $customerData['check_out_date'];
        $guest_count = $customerData['guests_count'];
        $room_id = $customerData['room_id'];
        $user_id = $customerData['user_id'];
        $data =  [
            'room_id' => $room_id,
            'user_id' => $user_id,
            'check_in_date' => $check_in_date,
            'check_out_date' => $check_out_date,
            'guests_count' => $guest_count,
        ];

        // Создаем новый объект бронирования
        $booking = new Booking($data);
        $booking->status = \App\Enums\Booking\Status::BOOKED->value;


        // Сохраняем бронирование в базе данных
        $booking->save();


        // После сохранения перенаправит пользователя на другую страницу
        return redirect()->route('bookings.show')->with('success', 'Бронирование успешно создано!');
    }

    public function price(Request $request)
    {
        $data = [
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'guests_count' => $request->input('guests_count'),
            'email' => $request->input('email'),
            'room_type' => $request->input('room_type'),
            'room_id' => $request->input('room_id'),
            'user_id' => $request->input('user_id'),
            'price' => $request->input('price'),
        ];
        return view('bookings.price', $data);
    }

    public function pay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            "amount" => 100 * 100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of laravel-hotel",
        ]);

        Session::flash('success', 'Payment Successfull!');
        return redirect()->route('bookings.save')->with(['customer_data' => $request->all()]);
    }

    // Отображение информации о конкретном бронировании
    public function show(Request $request)
    {
        return view('bookings.show');
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
