<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Services\MailService;
use Carbon\Carbon;
use Exception;
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
    public function create($room_id): View|RedirectResponse
    {
        //Проверка авторизации пользователя
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Для бронирования необходимо авторизоваться');
        }

        //Получаю из сессии данные о датах
        $check_in_date = session('check_in_date');
        $check_out_date = session('check_out_date');
        $guests_count = session('guest_count');

        //Получаю из url room_id
        $room = Room::findOrFail($room_id);

        //Получаю авторизированного user
        $user = Auth::user();

        return view('bookings.create', [
            'check_in_date' => $check_in_date,
            'check_out_date' => $check_out_date,
            'guests_count' => $guests_count,
            'room' => $room,
            'user' => $user,
        ]);
    }

    // Сохранение нового бронирования
    public function save(MailService $mailService)
    {
        //получаем данные из сессии, отправленные в pay.
        $customerData = session('customer_data');
        $check_in_date = $customerData['check_in_date'];
        $check_out_date = $customerData['check_out_date'];
        $client_last_name = $customerData['last_name'];
        $client_first_name = $customerData['first_name'];
        $client_patronymic = $customerData['patronymic_name'];
        $client_phone = $customerData['tel'];
        $client_email = $customerData['email'];
        $client_promo_code = $customerData['promo_code'];
        $client_wishes = $customerData['wishes'];
        $room_id = $customerData['room_id'];
        $user_id = $customerData['user_id'];
        $client_guests_count = $customerData['guests_count'];
        $total_price = $customerData['total_price'];
        $data = [
            'room_id' => $room_id,
            'user_id' => $user_id,
            'check_in_date' => $check_in_date,
            'check_out_date' => $check_out_date,
            'client_first_name' => $client_first_name,
            'client_last_name' => $client_last_name,
            'client_middle_name' => $client_patronymic,
            'client_phone' => $client_phone,
            'client_email' => $client_email,
            'promo_code' => $client_promo_code,
            'client_wishes' => $client_wishes,
            'guests_count' => $client_guests_count,
            'total_price' => $total_price,
        ];
        // Создаем новый объект бронирования
        $booking = new Booking($data);
        $booking->status = \App\Enums\Booking\Status::BOOKED->value;

        // Сохраняем бронирование в базе данных
        $booking->save();

        // Отправляем письм с информацией о бронировании
        $mailService->sendConfirmation($booking);

        // После сохранения перенаправит пользователя на другую страницу
        return redirect()->route('bookings.show')->with('success', 'Бронирование успешно создано!');
    }

    public function price(Request $request)
    {
        $startDate = Carbon::parse($request->input('check_in_date'));
        $endDate = Carbon::parse($request->input('check_out_date'));
        $diff = $endDate->diffInDays($startDate);
        $data = [
            'room_id' => $request->input('room_id'),
            'user_id' => $request->input('user_id'),
            'check_in_date' => $request->input('check_in_date'),
            'check_out_date' => $request->input('check_out_date'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'patronymic_name' => $request->input('patronymic_name'),
            'tel' => $request->input('tel'),
            'email' => $request->input('email'),
            'promo_code' => $request->input('promo_code'),
            'wishes' => $request->input('wishes'),
            'guests_count' => $request->input('guests_count'),
            'price' => $request->input('price'),
            'days' => $diff,
            'stripe_error' => '',
        ];
        return view('bookings.price', $data);
    }

    public function pay_info(Request $request)
    {
        $customerData = $request->input('customer_data');
        $startDate = Carbon::parse($request->input('check_in_date'));
        $endDate = Carbon::parse($request->input('check_out_date'));
        $diff = $endDate->diffInDays($startDate);
        $promo_code = '';
        if (in_array("promo_code", $customerData)) {
            $promo_code = $customerData['promo_code'];
        }
        $wishes = '';
        if (in_array("wishes", $customerData)) {
            $wishes = $customerData['wishes'];
        }
        $error = $customerData['error'];
        $data = [
            'room_id' => $customerData['room_id'],
            'user_id' => $customerData['user_id'],
            'check_in_date' => $customerData['check_in_date'],
            'check_out_date' => $customerData['check_out_date'],
            'first_name' => $customerData['first_name'],
            'last_name' => $customerData['last_name'],
            'patronymic_name' =>  $customerData['patronymic_name'],
            'tel' =>  $customerData['tel'],
            'email' =>  $customerData['email'],
            'promo_code' =>  $promo_code,
            'wishes' =>  $wishes,
            'guests_count' =>  $customerData['guests_count'],
            'price' =>  $customerData['total_price'],
            'days' => $diff,
            'stripe_error' => $error,
        ];
        return view('bookings.price', $data);
    }

    public function pay(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create([
                "amount" => 100 * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of laravel-hotel",
            ]);

            Session::flash('success', 'Payment Successfull!');
            return redirect()->route('bookings.save')->with(['customer_data' => $request->all()]);
        } catch (Exception $e) {
            $dataWithError = $request->all();
            $dataWithError["error"] = $e->getMessage();
            return redirect()->route('bookings.pay_info', ['customer_data' => $dataWithError]);
        }
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
