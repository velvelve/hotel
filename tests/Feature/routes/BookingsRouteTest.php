<?php

namespace Tests\Feature;

use App\Enums\Booking\Status;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Tests\TestCase;

class BookingsRouteTest extends TestCase
{
    // Проверяем корректность работы маршрута `/bookings/create/{room_id}`.
    public function testCreateRoute()
    {
        // Находим пользователя с идентификатором 1
        $user = User::find(1);

        // Авторизуемся от имени данного пользователя
        $this->actingAs($user);

        // Находим комнату
        $room = Room::find(1);

        // Выполняем GET-запрос на маршрут '/bookings/create/{room_id}' и следуем перенаправлением
        $response = $this->followingRedirects()->get(route('bookings.create', ['room_id' => $room->id]));

        // Проверяем, что ответ имеет статус 200 (успешный запрос)
        $response->assertStatus(200);

        // Проверяем, что представление, связанное с этим ответом, является 'bookings.create'
        $response->assertViewIs('bookings.create');

        // Проверяем, что в представлении доступна переменная 'room' с ожидаемым значением
        $response->assertViewHas('room', $room);
    }

    // Проверяем сохранение заказа в БД.
    public function testSaveRoute()
    {
        // Создаем данные для сохранения бронирования
        $bookingData = [
            "room_id" => 4,
            "user_id" => 1,
            "check_in_date" => "2023-10-03",
            "check_out_date" => "2023-10-24",
            "last_name" => "Иван",
            "first_name" => "Иванов",
            "patronymic_name" => "Иванович",
            "tel" => "+123456789",
            "email" => "ivan.ivanov@example.com",
            "promo_code" => "ABC123",
            "wishes" => "Хотелось бы номер с видом на море.",
            "guests_count" => 3,
            "total_price" => 3444,
        ];

        // Устанавливаем значение id в 300 чтобы не было конфликтов с тестовыми данными
        $bookingData['id'] = 300;

        // Сохраняем данные в сессию
        session(['customer_data' => $bookingData]);

        // Выполняем GET-запрос на маршрут '/bookings/save' с данными для сохранения
        $response = $this->get(route('bookings.save'), $bookingData);

        // Проверяем, что ответ имеет статус 302 (перенаправление)
        $response->assertStatus(302);

        // Проверяем, что пользователь был перенаправлен на маршрут 'bookings.show'
        $response->assertRedirect(route('bookings.show'));

        // Проверяем добавление данных в таблицу 'bookings'
        $this->assertDatabaseHas('bookings', [
            "check_in_date" => "2023-10-03",
            "check_out_date" => "2023-10-24",
            "client_last_name" => "Иван",

        ]);

        // Удаляем данные из таблицы 'bookings'
        Booking::where('client_last_name', "Тест")->delete();
    }
}
